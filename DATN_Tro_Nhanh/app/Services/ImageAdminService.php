<?php

namespace App\Services;

use App\Models\Favourite;
use App\Models\Image;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
class ImageAdminService
{
 // Đảm bảo bạn đã import model User

 public function getImageUserId($id)
 {
     // Kiểm tra xem người dùng có đăng nhập không
     if (auth()->check()) {
         // Tìm người dùng theo ID
         $user = User::find($id);
 
         // Trả về hình ảnh của người dùng nếu tồn tại
         return $user ? $user->profile_image : null;
     }
 
     // Trả về null nếu người dùng chưa đăng nhập
     return null;
 }

  public function deleteImage($images): bool
  {
    $success = true; // Biến để theo dõi trạng thái xóa

    foreach ($images as $image) {
      $imagePath = public_path('assets/images/register_owner/' . $image);
      if (file_exists($imagePath)) {
        if (!unlink($imagePath)) {
          $success = false; // Nếu không xóa được, đánh dấu là không thành công
        }
      }
    }

    return $success; // Trả về true nếu tất cả các file đã được xóa thành công, ngược lại false
  }
  public function saveImage($image)
{
    if (isset($image['image'])) {
        $data = $image['image']; // Giả sử đây là đường dẫn tạm thời của hình ảnh
        $newFileName = time() . '_' . $data->getClientOriginalName(); // Tạo tên file mới
        $path = 'assets/images';

        // Kiểm tra nội dung bạo lực
        try {
            $imageContent = base64_encode(file_get_contents($data->getRealPath()));

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
            Log::info("Clarifai response: " . json_encode($result));

            $concepts = $result['outputs'][0]['data']['concepts'] ?? [];
            $violenceScore = 0;

            $inappropriateContent = ['gore', 'explicit', 'drug', 'suggestive', 'weapon'];

            foreach ($concepts as $concept) {
                if (in_array($concept['name'], $inappropriateContent)) {
                    $violenceScore += $concept['value'];
                    Log::info("Inappropriate content detected: " . $concept['name'] . " with score: " . $concept['value']);
                }
            }

            Log::info("Total inappropriate content score for image: " . $newFileName . " is " . $violenceScore);

            if ($violenceScore > 0.5) {
                Log::warning("Image rejected due to high inappropriate content score: " . $newFileName);
                return response()->json([
                    'status' => 'error',
                    'message' => 'Phát hiện ảnh không phù hợp: ' . $newFileName . '. Vui lòng kiểm tra lại ảnh của bạn.'
                ]);
            }
        } catch (GuzzleException $e) {
            Log::error("Clarifai API error: " . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Có lỗi xảy ra khi kiểm tra ảnh: ' . $e->getMessage()
            ]);
        } catch (\Exception $e) {
            Log::error("Error processing image: " . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Có lỗi xảy ra khi xử lý ảnh: ' . $e->getMessage()
            ]);
        }
  // Di chuyển ảnh vào thư mục đích nếu không có nội dung bạo lực
        $data->move(public_path($path), $newFileName); // Lưu hình ảnh vào thư mục 'public/assets/images'
        return $newFileName;
    }
    return false;
}
}
