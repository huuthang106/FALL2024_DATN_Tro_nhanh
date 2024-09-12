<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Identity;
use Illuminate\Support\Facades\Http;
use App\Models\Image;
use Illuminate\Support\Facades\Log;
use App\Events\ImagesUploaded;


class IdentityService
{
    protected const key_api_liveness = "jL44tn28V13GOJkIcn3shxq5R2HUOA9B";
    public function saveRegistrationData($data, $images)
    {
        // sau đó qua đay lưu dữ liệu bảng đăng ý 
        // dd($data,$images);
        // Lưu dữ liệu vào bảng RegistrationList
        $registration = Identity::create($data);
        $identity_id = $registration->id;
        //  sau khi thêm dc thì gọi thằng hàm hình ra đúng k 

        // Lưu hình ảnh liên quan
        $this->storeImages($images, $identity_id);
        // đến đay nó sẽ kết thúc câu lệnh nhưng hiện tại nó lại đi qua thằng loi 1
        return $registration;
    }




    public function handleRegistration(Request $request)
    {
        // dd('ádsa');
        Log::info('Request files:', $request->allFiles());
        // dd($request);
        if (!auth()->check()) {
            return response()->json(['error' => 'Bạn phải đăng nhập để đăng ký.']);
        }
        // Kiểm tra và lấy các tệp tin từ yêu cầu
        $fileCCCDMT = $request->file('CCCDMT');
        $fileCCCDMS = $request->file('CCCDMS');
        $allowedExtensions = ['mp4', 'webm', 'ogg'];
        $fileCCCDMS = $request->file('CCCDMS');

        // Kiểm tra định dạng tệp
        $allowedExtensions = ['mp4', 'webm', 'ogg'];
        $extension = $fileCCCDMS->getClientOriginalExtension();
        
        if (!in_array($extension, $allowedExtensions)) {
            return response()->json(['error' => 'Tệp video phải có định dạng mp4, webm hoặc ogg.']);
        }
        $newFileName = time() . '.' . $fileCCCDMS->getClientOriginalExtension();
        $newFilePath = storage_path('app/public/' . $newFileName);
        
        // Di chuyển tệp tin từ tmp đến đường dẫn mới
        $fileCCCDMS->move(storage_path('app/public'), $newFileName);
        
        // Kiểm tra sự tồn tại của tệp tin
        if (!file_exists($newFilePath)) {
            return response()->json(['error' => 'Tệp tin không tồn tại.']);
        }
        
        // Gửi tệp tin đến API
        $response = Http::withOptions(['verify' => false]) // Bỏ qua chứng chỉ SSL
            ->withHeaders(['api_key' => self::key_api_liveness]) // Đính kèm API key vào header
            ->attach('CCCDMS', fopen($newFilePath, 'r'), $newFileName) // Đính kèm tệp CCCDMS
            ->attach('cmnd', fopen($fileCCCDMT->getRealPath(), 'r'), $fileCCCDMT->getClientOriginalName()) // Đính kèm tệp CMND
            ->post('https://api.fpt.ai/dmp/liveness/v3'); // URL của API
        
        // Lấy kết quả trả về dưới dạng JSON
        $result = $response->json();
        Log::info('Kết quả từ API:', $result);
        
        // Xóa tệp tin tạm thời sau khi gửi
        unlink($newFilePath);
        
        return response()->json($result);

        // return response()->json(['error' =>  'ádas' .$result]);

        // $user_id = auth()->id();
        // $request->merge(['user_id' => $user_id]);
        // $temp = $request->file('CCCDMT');
        // Log::info('Dữ liệu yêu cầu:', $request->all());

        // $request->validate([
        //     'CCCDMT' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'CCCDMS' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     // 'FileFace' => 'required|mimes:mp4,webm,ogg', // Thay đổi ở đây
        // ], [
        //     'CCCDMT.required' => 'Vui lòng tải lên ảnh CMT/CCCD mặt trước.',
        //     'CCCDMS.required' => 'Vui lòng tải lên ảnh CMT/CCCD mặt sau.',
        //     // 'FileFace.required' => 'Vui lòng tải lên video khuôn mặt.', // Cập nhật thông báo lỗi
        // ]);
        // // dd($request);
        // // return response()->json(['error' =>  $request->CCCDMT]);


        // // Nhận diện từ ảnh
        // $front_ID_recognition = $this->sendToOCRService($request->file('CCCDMT'));
        // $rear_ID_recognition = $this->sendToOCRService($request->file('CCCDMS'));
        // // return response()->json([ $rear_ID_recognition]);   
        // if (isset($front_ID_recognition['errorCode']) && isset($rear_ID_recognition['errorCode'])) {
        //     if ($front_ID_recognition['errorCode'] === 0 && $rear_ID_recognition['errorCode'] === 0) {
        //         if (
        //             isset($front_ID_recognition['data'][0]['id']) && !empty($front_ID_recognition['data'][0]['id'])
        //             && isset($rear_ID_recognition['data'][0]['issue_date']) && !empty($rear_ID_recognition['data'][0]['issue_date'])
        //         ) {
        //             try {
        //                 // $response = Http::withOptions(['verify' => false])
        //                 //     ->withHeaders(['api_key' => self::key_api_liveness])
        //                 //     ->attach('file[]', fopen($request->file('CCCDMT')->getRealPath(), 'r'), $request->file('CCCDMT')->getClientOriginalName())
        //                 //     ->attach('file[]', fopen($request->file('FileFace')->getRealPath(), 'r'), $request->file('FileFace')->getClientOriginalName())
        //                 //     ->post('https://api.fpt.ai/dmp/checkface/v1');

        //                 // $face_authentication = $response->json();
        //                 $response = $this->uploadVideoAndCmnd($request);

        //                 $face_authentication = $response->json();
        //                 return response()->json(['error' =>  'ádas'.$face_authentication]);

        //                 if (isset($face_authentication['code']) && $face_authentication['code'] == 200 && $face_authentication['data']['isMatch'] == true) {
        //                     if ($face_authentication['data']['isBothImgIDCard'] == false) {
        //                         $responseData = $front_ID_recognition['data'][0];
        //                         $name = $responseData['name'];
        //                         $gender = ($responseData['sex'] == 'NAM') ? 1 : 2;
        //                         $identification_number = $responseData['id'];
        //                         event(new ImagesUploaded($request));
        //                         $data = [
        //                             'name' => $name,
        //                             'identification_number' => $identification_number,
        //                             'gender' => $gender,
        //                             'user_id' => $user_id,

        //                         ];

        //                         if (Identity::where('user_id', $user_id)
        //                             ->orWhere('identification_number', $identification_number)
        //                             ->exists()
        //                         ) {
        //                             return response()->json(['error' => 'Người dùng đã tồn tại với thông tin này.']);
        //                         } else {
        //                             // Lưu dữ liệu vào cơ sở dữ liệu

        //                             return response()->json([
        //                                 'success' => 'Đăng ký thành công.',
        //                                 'name' => $data['name'],
        //                                 'identification_number' => $data['identification_number'],
        //                                 'gender' => $data['gender'],

        //                             ]);
        //                         }
        //                     } else {
        //                         return response()->json(['error' => 'Không có hình ảnh chân dung.']);
        //                     }
        //                 } else {
        //                     return response()->json(['error' => 'Lỗi xác thực khuôn mặt.']);
        //                 }
        //             } catch (\Exception $e) {
        //                 Log::error('Exception occurred:', ['exception' => $e->getMessage()]);
        //                 return response()->json(['error' => 'Đã xảy ra lỗi. Vui lòng thử lại sau.']);
        //             }
        //         } else {
        //             return response()->json(['error' => 'Không đủ dữ liệu cả 2 mặt. Vui lòng kiểm tra lại ảnh.']);
        //         }
        //     } else {
        //         return response()->json(['error' => 'Lỗi nhận dạng CCCD.']);
        //     }
        // } else {
        //     return response()->json(['error' => 'Lỗi nhận dạng CCCD']);
        // }
    }



    public function uploadVideoAndCmnd(Request $request)
    {
        // Gửi yêu cầu đến API của FPT AI
        $response = Http::withOptions(['verify' => false]) // Bỏ qua chứng chỉ SSL
            ->withHeaders(['api_key' => self::key_api_liveness]) // Đính kèm API key vào header
            ->attach('CCCDMT', fopen($request->file('CCCDMT')->getRealPath(), 'r'), $request->file('CCCDMT')->getClientOriginalName()) // File CCCDMT
            ->attach('FileFace', fopen($request->file('FileFace')->getRealPath(), 'r'), $request->file('FileFace')->getClientOriginalName()) // File khuôn mặt
            ->post('https://api.fpt.ai/dmp/liveness/v3'); // URL của API

        // Lấy kết quả trả về dưới dạng JSON
        $result = $response->json();

        // In hoặc xử lý kết quả
        return response()->json($result);
    }
    public function sendToOCRService($image)
    {
        $fileName = $image->getPathname();
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $fileName);
        finfo_close($finfo);

        $cFile = curl_file_create($fileName, $mimeType, $image->getClientOriginalName());
        $data = array("image" => $cFile, "filename" => $cFile->postname);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.fpt.ai/vision/idr/vnm",
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "api-key: ZsfqLY2AEpVbtMHIU7UWycjBnLiqdNOb"
            ),
            CURLOPT_RETURNTRANSFER => true, // Trả về kết quả dưới dạng chuỗi thay vì in ra
            CURLOPT_SSL_VERIFYPEER => false, // Tắt xác thực SSL

        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return ['error' => "cURL Error #:" . $err];
        } else {

            return json_decode($response, true);
        }
    }
    public function storeImages($images, $id)
    {

        // Lưu thông tin hình ảnh vào cơ sở dữ liệu
        foreach ($images as $filename) {
            Image::create([
                'identity_id' => $id,
                'filename' => $filename,
            ]);
        }

        session()->forget('image_paths');
        // Log thông tin hình ảnh đã lưu
        Log::info('Stored images:', ['images' => $images]);
        return true;
    }







    private function handleOCRErrors($frontErrorCode, $rearErrorCode)
    {
        $errorMessages = [
            1 => 'Sai thông số trong request (Ví dụ không có Key hoặc ảnh trong request body).',
            2 => 'CCCD trong ảnh bị thiếu góc nên không thể Crop về dạng chuẩn.',
            3 => 'Hệ thống không tìm thấy CCCD trong ảnh hoặc ảnh có chất lượng kém (Quá mờ, quá tối/sáng).',
            5 => 'Request sử dụng Key Image_Url nhưng giá trị bỏ trống.',
            6 => 'Request sử dụng Key Image_Url nhưng hệ thống không thể mở được Url này.',
            7 => 'File gửi lên không phải là File ảnh.',
            8 => 'File ảnh gửi lên bị hỏng hoặc format không được hỗ trợ.',
            9 => 'Request sử dụng Key Image_Base64 nhưng giá trị bỏ trống.',
            10 => 'Request sử dụng Key Image_Base64 nhưng chuỗi Base64 không phải của file ảnh.',
            11 => 'Kích thước ảnh gửi lên vượt quá kích thước cho phép.',
            12 => 'Tạm thời không xử lý được do chưa hỗ trợ định dạng CCCD.',
            13 => 'Không nhận dạng được mặt sau của CCCD.',
        ];

        if (isset($errorMessages[$frontErrorCode])) {
            return redirect()->back()->with(['error' => $errorMessages[$frontErrorCode], 'showAlert' => true]);
        }

        return redirect()->back()->with(['error' => 'Lỗi hệ thống', 'showAlert' => true]);
    }

    // Hàm xử lý các lỗi xác thực khuôn mặt
    private function handleFaceAuthErrors($errorCode)
    {
        $errorMessages = [
            407 => 'Không nhận dạng được khuôn mặt.',
            408 => 'Ảnh đầu vào không đúng định dạng.',
            409 => 'Có nhiều hoặc ít hơn số lượng (2) khuôn mặt cần xác thực.',
            'default' => 'Lỗi hệ thống!',
        ];

        if (isset($errorMessages[$errorCode])) {
            return redirect()->back()->with(['error' => $errorMessages[$errorCode], 'showAlert' => true]);
        }

        return redirect()->back()->with(['error' => $errorMessages['default'], 'showAlert' => true]);
    }

    public function getIdIdentity($user_id)
    {
        $identity = Identity::where('user_id', $user_id)->first();
        return $identity ? $identity->id : null;
    }
}
