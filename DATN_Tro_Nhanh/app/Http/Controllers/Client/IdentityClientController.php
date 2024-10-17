<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\IdentityService;
class IdentityClientController extends Controller
{
    protected $IdentityService;

    public function __construct(IdentityService $IdentityService)
    {
        $this->IdentityService = $IdentityService;
    }

    public function storeData(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'cmnd_number' => 'required|string',
                'full_name' => 'required|string',
            
            ]);
    
            
    
            $imagePaths = session()->get('image_paths', []);
    
            $data = [
                'identification_number' => $validatedData['cmnd_number'],
                'name' => $validatedData['full_name'],
                
                'user_id' => auth()->id(),
            ];
    
            $images = [
                'cccdmt_filename' => $imagePaths['cccdmt_filename'] ?? null,
                'cccdms_filename' => $imagePaths['cccdms_filename'] ?? null,
            ];
    
            $this->IdentityService->saveRegistrationData($data, $images);
    
            return redirect()->route('owners.show.information-ekyc')->with('success', 'Dữ liệu và hình ảnh đã được lưu thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi lưu dữ liệu.');
        }
    }


    public function store(Request $request)
    {
        // dd($request->all());
        // Kiểm tra xem registrationService có được inject thành công không
        if ($this->IdentityService) {
            // Nếu có, gọi phương thức handleRegistration từ service

            return $this->IdentityService->handleRegistration($request);
        } else {
            // Nếu không, trả về lỗi hoặc thông báo rằng service không được inject
            return redirect()->back()->with(['error' => 'Đã xảy ra lỗi, dịch vụ không được khởi tạo thành công.']);
        }
    }
   
}
