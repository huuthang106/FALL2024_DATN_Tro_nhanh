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
    protected  $key_api_liveness;
    protected  $key_ID_Recognition;
    public function __construct()
    {
        // Gán giá trị từ biến môi trường vào các thuộc tính
        $this->key_api_liveness = getenv('FPT_AI_API_KEY');
        $this->key_ID_Recognition = getenv('FPT_AI_API_KEY');
        // Nếu bạn có thêm các biến khác, bạn có thể gán tương tự
        // $this->key_ID_Recognition = getenv('ANOTHER_API_KEY');
    }
    public function getApiKeyLiveness()
    {
        return $this->key_api_liveness;
    }

    // Phương thức getter cho key_ID_Recognition
    public function getIdRecognitionKey()
    {
        return $this->key_ID_Recognition;
    }
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
        // dd($request->all()); 
        // session()->flush();
        Log::info('Kết quả từ API:' . $request);

        if ($request->hasFile('videoFile') && $request->hasFile('CCCDMT')) {
            // Lấy thông tin tệp video và hình ảnh
            $videoFile = $request->file('videoFile');
            $idFile = $request->file('CCCDMT');

            // Hiển thị thông tin tệp tin
            // dd($videoFile, $idFile);
        } else {
            return response()->json(['error' => 'Không có tệp tin nào được gửi.']);
        }
        // Log::info('Request files:', $request->allFiles());
        // dd($request);
        if (!auth()->check()) {
            return response()->json(['error' => 'Bạn phải đăng nhập để đăng ký.']);
        }


        // Gửi tệp tin đến API

        $response = $this->uploadVideoAndCmnd($request);
        // Kiểm tra mã trạng thái HTTP
        if ($response->failed()) {
            Log::error('Yêu cầu không thành công', [
                'response' => $response->body(), // Ghi lại nội dung phản hồi
                'status' => $response->status(), // Ghi lại mã trạng thái
            ]);
            return response()->json(['error' => 'Yêu cầu không thành công.'], 500); // Trả về JSON với mã lỗi 500
        }

        // Lấy kết quả trả về dưới dạng JSON
        $result = $response->json();

        // Kiểm tra xem có dữ liệu trả về không
        if (is_null($result)) {
            return response()->json(['error' => 'Không có dữ liệu trả về từ API.'], 500); // Trả về JSON với mã lỗi 500
        }

        Log::info('Kết quả từ API:', $result);

        // Kiểm tra mã lỗi
        // if (isset($result['code']) && $result['code'] == 409) {
        //     return response()->json(['error' => 'Lỗi: ' . $result['message']], 409); // Trả về JSON với mã lỗi 409
        // } elseif (isset($result['code']) && $result['code'] == 200) {
        //     // Xử lý kết quả thành công
        //     $liveness = $result['liveness'];
        //     if ($liveness['is_live'] === 'true') {
        //         $front_ID_recognition = $this->sendToOCRService($request->file('CCCDMT'));
        //         $rear_ID_recognition = $this->sendToOCRService($request->file('CCCDMS'));
        //         Log::info('Kết quả từ API doc id:', $rear_ID_recognition);
        //         $user_id = auth()->id();
        //         $request->merge(['user_id' => $user_id]);
        //         // return response()->json([ $rear_ID_recognition]);   
        //         if (isset($front_ID_recognition['errorCode']) && isset($rear_ID_recognition['errorCode'])) {
        //             if ($front_ID_recognition['errorCode'] === 0 && $rear_ID_recognition['errorCode'] === 0) {
        //                 if (
        //                     isset($front_ID_recognition['data'][0]['id']) && !empty($front_ID_recognition['data'][0]['id'])
        //                     && isset($rear_ID_recognition['data'][0]['issue_date']) && !empty($rear_ID_recognition['data'][0]['issue_date'])
        //                 ) {
        //                     try {
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
        //                             // return response()->json(['error' => 'loi 1 ti']);

        //                             return response()->json([
        //                                 'success' => 'Đăng ký thành công.',
        //                                 'name' => $data['name'],
        //                                 'identification_number' => $data['identification_number'],
        //                                 'gender' => $data['gender'],

        //                             ]);
        //                         }
        //                     } catch (\Exception $e) {
        //                         Log::error('Exception occurred:', ['exception' => $e->getMessage()]);
        //                         return response()->json(['error' => 'Đã xảy ra lỗi. Vui lòng thử lại sau.']);
        //                     }
        //                 } else {
        //                     return response()->json(['error' => 'Không đủ dữ liệu cả 2 mặt. Vui lòng kiểm tra lại ảnh.']);
        //                 }
        //             } else {
        //                 return response()->json(['error' => 'Lỗi nhận dạng CCCD.']);
        //             }
        //         } else {
        //             return response()->json(['error' => 'Lỗi nhận dạng CCCD']);
        //         }
        //         // jjjj
        //         // return response()->json(['message' => 'Kiểm tra sự sống thành công.']); // Trả về JSON thành công
        //     } else {
        //         return response()->json(['error' => 'Kiểm tra sự sống không thành công.'], 400); // Trả về JSON với mã lỗi 400
        //     }
        // } elseif (isset($result['code']) && $result['code'] == 303) {
        //     return response()->json(['error' => 'Khuôn mặt không khớp'], 400); // Trả về JSON với mã lỗi 400
        // } elseif (isset($result['code']) && $result['code'] == 429) {
        //     return response()->json(['error' => 'Quá tải hết key'], 400); // Trả về JSON với mã lỗi 400
        // } elseif (isset($result['code']) && $result['code'] == 406) {
        //     return response()->json(['error' => 'Ảnh không đủ chất lượng'], 400); // Trả về JSON với mã lỗi 400
        // } elseif (isset($result['code']) && $result['code'] == 411) {
        //     return response()->json(['error' => 'Mặt bạn quá xa'], 400); // Trả về JSON với mã lỗi 400
        // } elseif (isset($result['code']) && $result['code'] == 301) {
        //     return response()->json(['error' => 'Khuôn mặt giả'], 400); // Trả về JSON với mã lỗi 400
        // } elseif (isset($result['code']) && $result['code'] == 423) {
        //     return response()->json(['error' => 'Khuôn mặt bạn đang ngoài khung hình'], 400); // Trả về JSON với mã lỗi 400
        // } elseif (isset($result['code']) && $result['code'] == 403) {
        //     return response()->json(['error' => 'Không thể sử dụng dịch vụ'], 400); // Trả về JSON với mã lỗi 400
        // } elseif (isset($result['code']) && $result['code'] == 408) {
        //     return response()->json(['error' => 'Có nhiều khuôn mặt'], 400); // Trả về JSON với mã lỗi 400
        // } elseif (isset($result['code']) && $result['code'] == 410) {
        //     return response()->json(['error' => 'Không thấy khuôn mặt'], 400); // Trả về JSON với mã lỗi 400
        // } else {
        //     return response()->json(['error' => 'Lỗi: ' . json_encode($result)], 500); // Trả về JSON với mã lỗi 500
        // }
        switch ($result['code'] ?? null) {
            case 409:
                return response()->json(['error' => 'Lỗi: ' . $result['message']], 409); // Trả về JSON với mã lỗi 409
            case 200:
                // Xử lý kết quả thành công
                $liveness = $result['liveness'];
                if ($liveness['is_live'] === 'true') {
                    $front_ID_recognition = $this->sendToOCRService($request->file('CCCDMT'));
                    $rear_ID_recognition = $this->sendToOCRService($request->file('CCCDMS'));
                    Log::info('Kết quả từ API doc id:', $rear_ID_recognition);
                    $user_id = auth()->id();
                    $request->merge(['user_id' => $user_id]);

                    if (isset($front_ID_recognition['errorCode']) && isset($rear_ID_recognition['errorCode'])) {
                        if ($front_ID_recognition['errorCode'] === 0 && $rear_ID_recognition['errorCode'] === 0) {
                            if (
                                isset($front_ID_recognition['data'][0]['id']) && !empty($front_ID_recognition['data'][0]['id'])
                                && isset($rear_ID_recognition['data'][0]['issue_date']) && !empty($rear_ID_recognition['data'][0]['issue_date'])
                            ) {
                                try {
                                    $responseData = $front_ID_recognition['data'][0];
                                    $name = $responseData['name'];
                                    $gender = ($responseData['sex'] == 'NAM') ? 1 : 2;
                                    $identification_number = $responseData['id'];
                                    event(new ImagesUploaded($request));

                                    $data = [
                                        'name' => $name,
                                        'identification_number' => $identification_number,
                                        'gender' => $gender,
                                        'user_id' => $user_id,
                                    ];

                                    if (Identity::where('user_id', $user_id)
                                        ->orWhere('identification_number', $identification_number)
                                        ->exists()
                                    ) {
                                        return response()->json(['error' => 'Người dùng đã tồn tại với thông tin này.']);
                                    } else {
                                        return response()->json([
                                            'success' => 'Đăng ký thành công.',
                                            'name' => $data['name'],
                                            'identification_number' => $data['identification_number'],
                                            'gender' => $data['gender'],
                                        ]);
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
                } else {
                    return response()->json(['error' => 'Kiểm tra sự sống không thành công.'], 400); // Trả về JSON với mã lỗi 400
                }
            case 303:
                return response()->json(['error' => 'Khuôn mặt không khớp'], 400); // Trả về JSON với mã lỗi 400
            case 429:
                return response()->json(['error' => 'Quá tải hết key'], 400); // Trả về JSON với mã lỗi 400
            case 406:
                return response()->json(['error' => 'Ảnh không đủ chất lượng'], 400); // Trả về JSON với mã lỗi 400
            case 411:
                return response()->json(['error' => 'Mặt bạn quá xa'], 400); // Trả về JSON với mã lỗi 400
            case 301:
                return response()->json(['error' => 'Khuôn mặt giả'], 400); // Trả về JSON với mã lỗi 400
            case 423:
                return response()->json(['error' => 'Khuôn mặt bạn đang ngoài khung hình'], 400); // Trả về JSON với mã lỗi 400
            case 403:
                return response()->json(['error' => 'Không thể sử dụng dịch vụ'], 400); // Trả về JSON với mã lỗi 400
            case 408:
                return response()->json(['error' => 'Có nhiều khuôn mặt'], 400); // Trả về JSON với mã lỗi 400
            case 410:
                return response()->json(['error' => 'Không thấy khuôn mặt'], 400); // Trả về JSON với mã lỗi 400
            default:
                return response()->json(['error' => 'Lỗi: ' . json_encode($result)], 500); // Trả về JSON với mã lỗi 500
        }
    }



    public function uploadVideoAndCmnd($request)
    {
        $response = Http::withOptions(['verify' => false])
            ->withHeaders(['api_key' => $this->getApiKeyLiveness()])
            ->attach('cmnd', fopen($request->file('CCCDMT')->getRealPath(), 'r'), $request->file('CCCDMT')->getClientOriginalName()) // Sử dụng CCCDMT cho video
            ->attach('video', fopen($request->file('videoFile')->getRealPath(), 'r'), $request->file('videoFile')->getClientOriginalName()) // Sử dụng videoFile cho CMND
            ->post('https://api.fpt.ai/dmp/liveness/v3');
        // Lấy kết quả trả về dưới dạng JSON


        // In hoặc xử lý kết quả
        return $response;
    }
    public function sendToOCRService($image)
    {
        // lấy dữ liệu cccd
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
                "api-key: " . $this->key_ID_Recognition // Sử dụng thuộc tính để lấy API key
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
