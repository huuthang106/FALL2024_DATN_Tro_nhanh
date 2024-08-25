<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\RegistrationList;
use Illuminate\Support\Facades\Http;
use App\Models\Imagesmember;
use Illuminate\Support\Facades\Log;
class RegistrationService
{
    public function saveRegistrationData(Request $request, $data)
{
    // Lưu dữ liệu vào bảng RegistrationList
    $registration = RegistrationList::create($data);
    $memberregistration_id = $registration->id;

    // Lưu hình ảnh liên quan
    $this->storeImages($request, $memberregistration_id);
    
    return $registration;
}

    


public function handleRegistration(Request $request)
{
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

    // Nhận diện từ ảnh
    $front_ID_recognition = $this->sendToOCRService($request->file('CCCDMT'));
    $rear_ID_recognition = $this->sendToOCRService($request->file('CCCDMS'));

    if (isset($front_ID_recognition['errorCode']) && isset($rear_ID_recognition['errorCode'])) {
        if ($front_ID_recognition['errorCode'] === 0 && $rear_ID_recognition['errorCode'] === 0) {
            if (
                isset($front_ID_recognition['data'][0]['id']) && !empty($front_ID_recognition['data'][0]['id'])
                && isset($rear_ID_recognition['data'][0]['issue_date']) && !empty($rear_ID_recognition['data'][0]['issue_date'])
            ) {
                try {
                    $response = Http::withOptions(['verify' => false])
                        ->withHeaders(['api_key' => 'aL3PekmHpdXEeT8qKB2vE5ntiRIaMpob'])
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

                            // Lưu hình ảnh
                            $cccdmtPath = $request->file('CCCDMT')->move(public_path('assets/images'), 'cccdmt_' . time() . '.' . $request->file('CCCDMT')->extension());
                            $cccdmsPath = $request->file('CCCDMS')->move(public_path('assets/images'), 'cccdms_' . time() . '.' . $request->file('CCCDMS')->extension());
                            $fileFacePath = $request->file('FileFace')->move(public_path('assets/images'), 'fileface_' . time() . '.' . $request->file('FileFace')->extension());

                            $data = [
                                'name' => $name,
                                'description' => $description,
                                'identification_number' => $identification_number,
                                'gender' => $gender,
                                'user_id' => $user_id,
                                'cccdmt_path' => 'assets/images/' . basename($cccdmtPath),
                                'cccdms_path' => 'assets/images/' . basename($cccdmsPath),
                                'fileface_path' => 'assets/images/' . basename($fileFacePath),
                            ];

                            if (RegistrationList::where('user_id', $user_id)->exists()) {
                                return response()->json(['error' => 'Người dùng đã tồn tại.']);
                            } else {
                                // Lưu dữ liệu vào cơ sở dữ liệu
                              
                                return response()->json([
                                    'success' => 'Đăng ký thành công.',
                                    'name' => $data['name'],
                                    'description' => $data['description'],
                                    'identification_number' => $data['identification_number'],
                                    'gender' => $data['gender'],
                                    'cccdmt_path' => $data['cccdmt_path'],
                                    'cccdms_path' => $data['cccdms_path'],
                                    'fileface_path' => $data['fileface_path'],
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
                "api-key: aL3PekmHpdXEeT8qKB2vE5ntiRIaMpob"
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

    public function storeImages(Request $request, $id)
    {
        // Xác thực hình ảnh
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Lưu hình ảnh vào thư mục public
        $imagePaths = [];
    
        // Kiểm tra nếu có hình ảnh được gửi
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Lưu hình ảnh vào thư mục public
                $imagePath = $image->store('assets/images', 'public');
                $imagePaths[] = $imagePath;
    
                // Lưu thông tin hình ảnh vào cơ sở dữ liệu
                Imagesmember::create([
                    'memberregistration_id' => $id,
                    'filename' => $imagePath,
                ]);
            }
        }
    
        // Log hình ảnh đã lưu
        Log::info('Stored images:', ['images' => $imagePaths]);
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
}