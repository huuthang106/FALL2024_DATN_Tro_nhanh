<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ImagesUploaded;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class StoreImagesListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ImagesUploaded $event)
    {
        $request = $event->request;

        try {
            // Đặt tên file với timestamp để đảm bảo tính duy nhất
            $cccdmtFilename = 'cccdmt_' . time() . '.' . $request->file('CCCDMT')->extension();
            $cccdmsFilename = 'cccdms_' . time() . '.' . $request->file('CCCDMS')->extension();
            $fileFaceFilename = 'fileface_' . time() . '.' . $request->file('FileFace')->extension();

            // Di chuyển file vào thư mục public/assets/images/register_owner
            $cccdmtPath = $request->file('CCCDMT')->move(public_path('assets/images/register_owner'), $cccdmtFilename);
            $cccdmsPath = $request->file('CCCDMS')->move(public_path('assets/images/register_owner'), $cccdmsFilename);
            $fileFacePath = $request->file('FileFace')->move(public_path('assets/images/register_owner'), $fileFaceFilename);

            // Lưu tên file vào session
            session()->put('image_paths', [
                'cccdmt_filename' => $cccdmtFilename,
                'cccdms_filename' => $cccdmsFilename,
                'fileface_filename' => $fileFaceFilename,
            ]);
        } catch (\Exception $e) {
            Log::error('Exception occurred while storing images:', ['exception' => $e->getMessage()]);
        }
    }
}
