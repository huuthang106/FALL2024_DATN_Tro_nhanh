<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class ProfileService
{
    /**
     * Lấy thông tin người dùng dựa trên ID.
     *
     * @param int $id
     * @return User|null
     */
    private $client;
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.clarifai.com/v2/',
            'headers' => [
                'Authorization' => 'Key ' . env('CLARIFAI_API_KEY'),
                'Content-Type' => 'application/json',
            ]
        ]);
    }
    public function getUserById($slug)
    {
        return User::where('slug', $slug)->firstOrFail();
    }


    /**
     * Cập nhật thông tin người dùng.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    // public function updateProfileBySlug($id, array $data)
    // {
    //     $user = User::findOrFail($id);

    //     if (isset($data['image'])) {
    //         $image = $data['image'];

    //         // Kiểm tra tính hợp lệ của ảnh
    //         if (!$image->isValid()) {
    //             return [
    //                 'success' => false,
    //                 'message' => 'Định dạng ảnh không hợp lệ. Chỉ chấp nhận jpg, jpeg, png, gif.'
    //             ];
    //         }

    //         // Kiểm tra định dạng và kích thước ảnh
    //         $validExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    //         $extension = $image->getClientOriginalExtension();
    //         $size = $image->getSize();

    //         if (!in_array($extension, $validExtensions)) {
    //             return [
    //                 'success' => false,
    //                 'message' => 'Định dạng ảnh không hợp lệ. Chỉ chấp nhận jpg, jpeg, png, gif.'
    //             ];
    //         }

    //         if ($size > 5242880) { // 5MB
    //             return [
    //                 'success' => false,
    //                 'message' => 'Kích thước ảnh không được vượt quá 5MB.'
    //             ];
    //         }

    //         // Nếu tất cả các điều kiện đều hợp lệ, tiếp tục xử lý
    //         $imageContent = base64_encode(file_get_contents($image->getRealPath()));

    //         // Sử dụng cache cho kết quả kiểm tra ảnh
    //         $cacheKey = 'image_check_' . md5($imageContent);
    //         $violenceScore = Cache::remember($cacheKey, 3600, function () use ($imageContent) {
    //             return $this->checkImageContent($imageContent);
    //         });

    //         if ($violenceScore > 0.5) {
    //             return [
    //                 'success' => false,
    //                 'message' => 'Ảnh chứa nội dung không phù hợp. Vui lòng chọn ảnh khác.'
    //             ];
    //         }

    //         // Xử lý lưu ảnh
    //         $filename = $this->saveImage($image);
    //         $data['image'] = $filename;

    //         return [
    //             'success' => true,
    //             'message' => 'Ảnh đã được lưu thành công.'
    //         ];
    //     }

    //     // Cập nhật thông tin người dùng
    //     $this->updateUserInfo($user, $data);

    //     return [
    //         'success' => true,
    //         'message' => 'Cập nhật thông tin thành công.'
    //     ];
    // }
    public function updateProfileBySlug($id, array $data)
    {
        $user = User::findOrFail($id);
    
        if (isset($data['image'])) {
            $image = $data['image'];
    
            // Kiểm tra tính hợp lệ của ảnh
            if (!$image->isValid()) {
                return [
                    'success' => false,
                    'message' => 'Định dạng ảnh không hợp lệ. Chỉ chấp nhận jpg, jpeg, png, gif.'
                ];
            }
    
            // Kiểm tra định dạng và kích thước ảnh
            $validExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $extension = $image->getClientOriginalExtension();
            $size = $image->getSize();
    
            if (!in_array($extension, $validExtensions)) {
                return [
                    'success' => false,
                    'message' => 'Định dạng ảnh không hợp lệ. Chỉ chấp nhận jpg, jpeg, png, gif.'
                ];
            }
    
            if ($size > 5242880) { // 5MB
                return [
                    'success' => false,
                    'message' => 'Kích thước ảnh không được vượt quá 5MB.'
                ];
            }
    
            // Nếu tất cả các điều kiện đều hợp lệ, tiếp tục xử lý
            $imageContent = base64_encode(file_get_contents($image->getRealPath()));
    
            // Sử dụng cache cho kết quả kiểm tra ảnh
            $cacheKey = 'image_check_' . md5($imageContent);
            $violenceScore = Cache::remember($cacheKey, 3600, function () use ($imageContent) {
                return $this->checkImageContent($imageContent);
            });
    
            if ($violenceScore > 0.5) {
                return [
                    'success' => false,
                    'message' => 'Ảnh chứa nội dung không phù hợp. Vui lòng chọn ảnh khác.'
                ];
            }
    
            // Xử lý lưu ảnh
            $filename = $this->saveImage($image);
            $data['image'] = $filename; // Lưu tên file vào mảng dữ liệu
        }
    
        // Cập nhật thông tin người dùng
        $this->updateUserInfo($user, $data);
    
        return [
            'success' => true,
            'message' => 'Cập nhật thông tin thành công.'
        ];
    }
    private function checkImageContent($imageContent)
    {
        try {
            $response = $this->client->post('models/moderation-recognition/outputs', [
                'json' => [
                    'inputs' => [
                        [
                            'data' => [
                                'image' => [
                                    'base64' => $imageContent
                                ]
                            ]
                        ]
                    ]
                ]
            ]);

            $result = json_decode($response->getBody(), true);
            $concepts = $result['outputs'][0]['data']['concepts'] ?? [];
            $violenceScore = 0;

            $inappropriateContent = ['gore', 'explicit', 'drug', 'suggestive', 'weapon'];

            foreach ($concepts as $concept) {
                if (in_array($concept['name'], $inappropriateContent)) {
                    $violenceScore += $concept['value'];
                }
            }

            return $violenceScore;
        } catch (GuzzleException $e) {
            // Xử lý lỗi
            return 0;
        }
    }

    private function saveImage($image)
    {
        $timestamp = now()->format('YmdHis');
        $originalName = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $filename = pathinfo($originalName, PATHINFO_FILENAME) . '-' . $timestamp . '.' . $extension;

        $destinationPath = public_path('assets/images');
        if (!is_dir($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $image->move($destinationPath, $filename);

        return $filename;
    }

    private function updateUserInfo($user, $data)
    {
        if (isset($data['name'])) {
            $data['slug'] = Str::slug($data['name']) . '-' . $user->id;
        }

        if (isset($data['province']) || isset($data['district']) || isset($data['village'])) {
            $data['province'] = $data['province'] ?? $user->province;
            $data['district'] = $data['district'] ?? $user->district;
            $data['village'] = $data['village'] ?? $user->village;
        }
        if (isset($data['image'])) {
            $image = $data['image'];

            // Kiểm tra tính hợp lệ của hình ảnh

            // // Tạo tên file duy nhất
            // $filename = time() . '_' . $image->getClientOriginalName();

            // // Lưu hình ảnh vào thư mục public/assets/images
            // $destinationPath = public_path('assets/images');
            // $image->move($destinationPath, $filename); // Di chuyển file đến thư mục đích
            // Log::info($filename);
            // // Cập nhật cột 'image' trong dữ liệu
            $data['image'] =  $image; // Lưu đường dẫn vào cột 'image'


        }

        Log::info($data);
        $user->update($data);
    }
}
