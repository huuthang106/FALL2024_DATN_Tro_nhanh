<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Registrationlist;
use App\Models\Identity;
use Illuminate\Support\Facades\Http;
use App\Models\Image;
use Illuminate\Support\Facades\Log;
use App\Events\ImagesUploaded;

class RegistrationService
{
    public function saveRegistrationData($data, $images)
    {
        $registration = Registrationlist::create($data);
        $memberregistration_id = $registration->id;

        $this->storeImages($images, $memberregistration_id);
        return $registration;
    }


    public function getRegistrationStatus($userId)
{
    $identity = Identity::where('user_id', $userId)->first();
    $isRegistered = !is_null($identity);
    $isInRegistrationList = $isRegistered ? Registrationlist::where('identity_id', $identity->id)->exists() : false;

    return compact('isInRegistrationList', 'isRegistered', 'identity');
}

    public function handleRegistration(Request $request)
    {


        // dd($request);
        if (!auth()->check()) {
            return response()->json(['error' => 'Bạn phải đăng nhập để đăng ký.']);
        }

        $user_id = auth()->id();
        $request->merge(['user_id' => $user_id]);

        $request->validate([
            'CCCDMT' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'CCCDMS' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'FileFace' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'CCCDMT.required' => 'Vui lòng tải lên ảnh CMT/CCCD mặt trước.',
            'CCCDMS.required' => 'Vui lòng tải lên ảnh CMT/CCCD mặt sau.',
            'FileFace.required' => 'Vui lòng tải lên ảnh khuôn mặt.',
        ]);
        // dd($request);

        // Nhận diện từ ảnh
        $front_ID_recognition = $this->sendToOCRService($request->file('CCCDMT'));
        $rear_ID_recognition = $this->sendToOCRService($request->file('CCCDMS'));
        // return response()->json([ $rear_ID_recognition]);   
        if (isset($front_ID_recognition['errorCode']) && isset($rear_ID_recognition['errorCode'])) {
            if ($front_ID_recognition['errorCode'] === 0 && $rear_ID_recognition['errorCode'] === 0) {
                if (
                    isset($front_ID_recognition['data'][0]['id']) && !empty($front_ID_recognition['data'][0]['id'])
                    && isset($rear_ID_recognition['data'][0]['issue_date']) && !empty($rear_ID_recognition['data'][0]['issue_date'])
                ) {
                    try {
                        $response = Http::withOptions(['verify' => false])
                            ->withHeaders(['api_key' => 'kKF03mZGXTblpB2UzVnSIi1ai64bcQHt'])
                            ->attach('file[]', fopen($request->file('CCCDMT')->getRealPath(), 'r'), $request->file('CCCDMT')->getClientOriginalName())
                            ->attach('file[]', fopen($request->file('FileFace')->getRealPath(), 'r'), $request->file('FileFace')->getClientOriginalName())
                            ->post('https://api.fpt.ai/dmp/checkface/v1');

                        $face_authentication = $response->json();

                        if (isset($face_authentication['code']) && $face_authentication['code'] == 200 && $face_authentication['data']['isMatch'] == true) {
                            if ($face_authentication['data']['isBothImgIDCard'] == false) {
                                $responseData = $front_ID_recognition['data'][0];
                                $name = $responseData['name'];
                                $gender = ($responseData['sex'] == 'NAM') ? 1 : 2;
                                $identification_number = $responseData['id'];
                                $description = 'Tôi muốn xin làm chủ trọ';

                                event(new ImagesUploaded($request));
                        
                                $data = [
                                    'name' => $name,
                                    'description' => $description,
                                    'identification_number' => $identification_number,
                                    'gender' => $gender,
                                    'user_id' => $user_id,

                                ];

                                if (Registrationlist::where('user_id', $user_id)
                                    ->orWhere('identification_number', $identification_number)
                                    ->exists()
                                ) {
                                    return response()->json(['error' => 'Người dùng đã tồn tại với thông tin này.']);
                                } else {

                                    return response()->json([
                                        'success' => 'Đăng ký thành công.',
                                        'name' => $data['name'],
                                        'description' => $data['description'],
                                        'identification_number' => $data['identification_number'],
                                        'gender' => $data['gender'],

                                    ]);
                                }
                            } else {
                                return response()->json(['error' => 'Không có hình ảnh chân dung.']);
                            }
                        } else {
                            return response()->json(['error' => 'Lỗi xác thực khuôn mặt.']);
                        }
                    } catch (\Exception $e) {
                        Log::error('Exception occurred:', ['exception' => $e->getMessage()]);
                        return response()->json(['error' => 'Đã xảy ra lỗi. Vui lòng thử lại sau.']);
                    }
                } else {
                    return response()->json(['error' => 'Không đủ dữ liệu cả 2 mặt. Vui lòng kiểm tra lại ảnh.']);
                }
            } else {
                return response()->json(['error' => 'Lỗi nhận dạng CCCD.']);
            }
        } else {
            return response()->json(['error' => 'Lỗi nhận dạng CCCD']);
        }
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
                "api-key: kKF03mZGXTblpB2UzVnSIi1ai64bcQHt"
            ),
            CURLOPT_RETURNTRANSFER => true, 
            CURLOPT_SSL_VERIFYPEER => false, 

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
        foreach ($images as $filename) {
            Image::create([
                'registrationlist_id' => $id,
                'filename' => $filename,
            ]);
        }

        session()->forget('image_paths');
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
    public function createRequest($data)
    {
        return Registrationlist::create([
          
            
            'identity_id' => $data['identity_id'],
            'description' => $data['reason'],
        ]);
    }
}
