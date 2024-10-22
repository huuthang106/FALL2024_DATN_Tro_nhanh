<?php

namespace App\Services;

use App\Models\Room;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Price;
use App\Models\Location;
use App\Models\Zone;
use Illuminate\Http\Request;
use App\Models\Resident;
use App\Models\Utility;
use Cocur\Slugify\Slugify;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Transaction;
use Carbon\Carbon;
use App\Models\PriceList;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Clarifai\ClarifaiClient;
use Clarifai\Api\Data;
use Clarifai\Api\Image as ClarifaiImage;
use Clarifai\Api\Input as ClarifaiInput;
use Clarifai\Api\PostModelOutputsRequest;
use Clarifai\Api\Status\StatusCode;
use Clarifai\Api\UserAppIDSet;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Services\ImageAdminService;


class RoomOwnersService
{
    /**
     * Lấy danh sách phòng liên quan đến người dùng hiện tại.
     *
     * @param int|null $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    /**
     * Lấy danh sách phòng cho người dùng, sắp xếp từ mới đến cũ và phân trang.
     *
     * @param int $userId
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    const CON_TRONG = 1; // Còn trống
    const DA_THUE = 2; // Đã thuê

    const CO = 1; // Có tiện ích
    const CHUA_CO = 0; // Chưa có tiện ích
    private $client;
    private $imageAdminService;
    
    public function __construct(ImageAdminService $imageAdminService)
    {
        $this->client = new Client([
            'base_uri' => 'https://api.clarifai.com/v2/',
            'headers' => [
                'Authorization' => 'Key ' . env('CLARIFAI_API_KEY'),
                'Content-Type' => 'application/json',
            ]
        ]);
        $this->imageAdminService = $imageAdminService;
    }

    public function getAllCategories()
    {
        return Category::all();
    }

    public function getAllPrices()
    {
        return Price::all();
    }
    public function getAllLocations()
    {
        return Location::all();
    }
    public function getAllZones()
    {
        return Zone::all();
    }
    // public function getRoomImages($roomId)
    // {
    //     return Image::where('room_id', $roomId)->get();
    // }
    // Phương thức để lấy thông tin phòng theo ID
    public function getRoomById($id)
    {
        return Room::find($id);
    }
    public function getRoomBySlug($slug)
{
    return Room::where('slug', $slug)->first(); // Lấy phòng dựa trên slug
}
    public function getRoomUtilities($roomId)
    {
        // Giả sử bạn đã có model `Utility`
        return Utility::where('room_id', $roomId)->first();
    }

    public function getPriceList()
    {
        return PriceList::all();
    }

    public function create($request, $id)
    {
        // Tạo một phòng mới
        if (auth()->check()) {
            $imagePath = $this->imageAdminService->saveImage($request);
    
            // Kiểm tra nếu saveImage trả về JsonResponse (lỗi) hoặc false
            if ($imagePath instanceof \Illuminate\Http\JsonResponse || $imagePath == false) {
                return $imagePath; // Trả về lỗi nếu có
            }
    
            $room = Room::create(attributes: [
                'title' => $request['title'], // Đảm bảo $request là mảng
                'description' => $request['description'], // Đảm bảo $request là mảng
                'quantity' => $request['quantity'], // Đảm bảo $request là mảng
                'price' => $request['price'], // Đảm bảo $request là mảng
                'image' => $imagePath, // Lưu đường dẫn ảnh vào cột 'image'
                'zone_id' => $id, // Nếu bạn có zone_id
            ]);
    
            if ($room) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function deleteImage($id)
    {
        try {
            $image = Image::find($id); // Sử dụng find thay vì findOrFail để kiểm tra sự tồn tại

            if (!$image) {
                return ['success' => false, 'message' => 'Ảnh không tồn tại.'];
            }

            $room = $image->room; // Giả sử bạn có quan hệ `room` trong model Image
            if ($room->images()->count() <= 1) {
                return ['success' => false, 'message' => 'Phòng cần ít nhất 1 ảnh.'];
            }

            $imagePath = public_path('assets/images/' . $image->filename);

            // Kiểm tra nếu file tồn tại và xóa nó
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Xóa bản ghi ảnh khỏi cơ sở dữ liệu
            $image->delete();

            return ['success' => true];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function showImages($id)
    {
        $room = Room::findOrFail($id);
        $images = $room->images()->paginate(3);

        return compact('room', 'images');
    }

    // Hiểm thị danh sách trọ của tài khoản
    public function getRooms($userId, $searchQuery = null, $sortBy = 'title')
    {
        $query = Room::where('user_id', $userId);
        // Lọc
        if (!empty($searchQuery)) {
            $query->where('title', 'like', '%' . $searchQuery . '%');
        }
        // Sắp xếp
        switch ($sortBy) {
            case 'price_low_to_high':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high_to_low':
                $query->orderBy('price', 'desc');
                break;
            case 'date_old_to_new':
                $query->orderBy('created_at', 'asc');
                break;
            case 'date_new_to_old':
            default:
                $query->orderBy('created_at', 'desc'); // Mặc định mới đến cũ
                break;
        }
        // Phân trang
        return $query->paginate(10);
    }

    // Lấy hình ảnh
    public function getRoomImageUrl(Room $room): string
    {
        $image = $room->images->first();
        return $image ? asset('assets/images/' . $image->filename) : asset('assets/images/properties-grid-08.jpg');
    }
    // Tổng số trọ của tài khoản
    public function getRoomCount($userId = null)
    {
        try {
            // Nếu userId không có hoặc NULL sẽ sử dụng auth()->id()
            $userId = $userId ?? auth()->id();

            // Đếm số lượng phòng thuộc về người dùng với ID cụ thể
            return Room::where('user_id', $userId)->count();
        } catch (\Exception $e) {
            // Ghi lại lỗi nếu có sự cố khi đếm số phòng
            Log::error('Error counting rooms: ' . $e->getMessage());
            return 0;
        }
    }


    // Hàm tạo Slug
    private function createSlug($name)
    {
        $slugify = new Slugify();
        $slug = $slugify->slugify($name);
        $existingCategory = Category::where('slug', $slug)->first();
        // Nếu slug đã tồn tại, thêm ID vào slug
        if ($existingCategory) {
            $slug = $slug . '-' . (Category::max('id') + 1);
        }
        return $slug;
    }
    // Chi Tiết phòng trọ
    public function getIdRoom($slug)
    {
        return Room::with('category', 'price', 'location', 'zone') // Thêm các quan hệ
            ->where('slug', $slug)
            ->firstOrFail();
    }
    // Cập nhật
    // public function update($request, $roomId)
    // {
    //     if (auth()->check()) {
    //         // Tìm phòng theo ID
    //         $room = Room::find($roomId);
    //         if (!$room) {
    //             return false; // Nếu phòng không tồn tại
    //         }

    //         // Cập nhật thông tin phòng
    //         $room->title = $request->input('title');
    //         $room->description = $request->input('description');
    //         $room->price = $request->input('price');
    //         $room->phone = $request->input('phone');
    //         $room->address = $request->input('address');
    //         $room->acreage = $request->input('acreage');
    //         $room->quantity = $request->input('quantity');
    //         $room->view = $request->input('view');

    //         $room->province = $request->input('province');
    //         $room->district = $request->input('district');
    //         $room->village = $request->input('village');
    //         $room->longitude = $request->input('longitude');
    //         $room->latitude = $request->input('latitude');
    //         $room->category_id = $request->input('category_id');
    //         $room->location_id = $request->input('location_id');

    //         $room->price_id = $request->input('price_id');
    //         $room->zone_id = $request->input('zone_id');

    //         // Cập nhật tiện ích
    //         // Lấy thông tin tiện ích hiện tại
    //         $utilities = Utility::where('room_id', $roomId)->first();

    //         if ($utilities) {
    //             // Cập nhật thông tin tiện ích
    //             $utilities->wifi = $request->has('wifi') ? self::CO : self::CHUA_CO;
    //             $utilities->air_conditioning = $request->has('air_conditioning') ? self::CO : self::CHUA_CO;
    //             $utilities->garage = $request->has('garage') ? self::CO : self::CHUA_CO;
    //             $utilities->bathrooms = $request->has('bathrooms') ? self::CO : self::CHUA_CO;
    //             // $utilities->bathrooms = $request->input('bathrooms', 0); // Số lượng phòng tắm
    //             $utilities->save();
    //         } else {
    //             // Nếu không có tiện ích, tạo mới
    //             $utilities = new Utility();
    //             $utilities->room_id = $roomId;
    //             $utilities->wifi = $request->has('wifi') ? self::CO : self::CHUA_CO;
    //             $utilities->air_conditioning = $request->has('air_conditioning') ? self::CO : self::CHUA_CO;
    //             $utilities->garage = $request->has('garage') ? self::CO : self::CHUA_CO;
    //             $utilities->bathrooms = $request->has('bathrooms') ? self::CO : self::CHUA_CO;
    //             // $utilities->bathrooms = $request->input('bathrooms', 0); // Số lượng phòng tắm
    //             $utilities->save();
    //         }

    //         // Tạo slug từ tiêu đề và ID phòng
    //         $slug = $this->createSlug($request->input('title')) . '-' . $roomId;
    //         $room->slug = $slug;
    //         // Lưu lại phòng với slug
    //         if (!$room->save()) {
    //             return false;
    //         }
    //         // Xử lý tải hình ảnh
    //         if ($request->hasFile('images')) {
    //             $images = $request->file('images');
    //             $uploadedFilenames = []; // Để lưu trữ các tên file đã được tải lên
    //             $violentImages = []; // Để lưu trữ tên các ảnh bạo lực

    //             // Xóa tất cả ảnh cũ của phòng
    //             $oldImages = Image::where('room_id', $roomId)->get();
    //             foreach ($oldImages as $oldImage) {
    //                 $oldImagePath = public_path('assets/images/' . $oldImage->filename);
    //                 if (file_exists($oldImagePath)) {
    //                     unlink($oldImagePath);
    //                 }
    //                 $oldImage->delete();
    //             }

    //             foreach ($images as $image) {
    //                 // Tạo tên file mới với timestamp
    //                 $timestamp = now()->format('YmdHis');
    //                 $originalName = $image->getClientOriginalName();
    //                 $extension = $image->getClientOriginalExtension();
    //                 $filename = $timestamp . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.' . $extension;

    //                 // Kiểm tra nội dung bạo lực
    //                 $imageContent = base64_encode(file_get_contents($image->getRealPath()));
    //                 try {
    //                     $response = $this->client->post('models/moderation-recognition/outputs', [
    //                         'json' => [
    //                             'inputs' => [
    //                                 [
    //                                     'data' => [
    //                                         'image' => [
    //                                             'base64' => $imageContent
    //                                         ]
    //                                     ]
    //                                 ]
    //                             ]
    //                         ]
    //                     ]);

    //                     $result = json_decode($response->getBody(), true);
    //                     $concepts = $result['outputs'][0]['data']['concepts'] ?? [];
    //                     $violenceScore = 0;

    //                     $inappropriateContent = ['gore', 'explicit', 'drug', 'suggestive', 'weapon'];

    //                     foreach ($concepts as $concept) {
    //                         if (in_array($concept['name'], $inappropriateContent)) {
    //                             $violenceScore += $concept['value'];
    //                         }
    //                     }

    //                     if ($violenceScore > 0.5) {
    //                         $violentImages[] = $originalName;
    //                         continue; // Bỏ qua ảnh này và chuyển sang ảnh tiếp theo
    //                     }

    //                     // Kiểm tra xem ảnh đã tồn tại trong cơ sở dữ liệu chưa
    //                     if (!in_array($filename, $uploadedFilenames)) {
    //                         // Lưu ảnh vào thư mục public/assets/images
    //                         $image->move(public_path('assets/images'), $filename);
    //                         // Lưu thông tin ảnh vào cơ sở dữ liệu
    //                         $imageModel = new Image();
    //                         $imageModel->room_id = $roomId;
    //                         $imageModel->filename = $filename;
    //                         $imageModel->save();
    //                         // Thêm tên file vào danh sách đã tải lên
    //                         $uploadedFilenames[] = $filename;
    //                     }
    //                 } catch (\Exception $e) {
    //                     \Log::error("Error processing image: " . $e->getMessage());
    //                     return [
    //                         'success' => false,
    //                         'message' => 'Có lỗi xảy ra khi xử lý ảnh: ' . $e->getMessage()
    //                     ];
    //                 }
    //             }

    //             if (!empty($violentImages)) {
    //                 // Xóa các ảnh đã upload
    //                 foreach ($uploadedFilenames as $filename) {
    //                     $path = public_path('assets/images/' . $filename);
    //                     if (file_exists($path)) {
    //                         unlink($path);
    //                     }
    //                     // Xóa bản ghi trong cơ sở dữ liệu
    //                     Image::where('room_id', $roomId)->where('filename', $filename)->delete();
    //                 }

    //                 return [
    //                     'success' => false,
    //                     'message' => 'Phát hiện ảnh không phù hợp: ' . implode(', ', $violentImages) . '. Vui lòng kiểm tra lại ảnh của bạn.'
    //                 ];
    //             }
    //         }

    //         return ['success' => true];
    //     } else {
    //         return false; // Nếu người dùng chưa đăng nhập, trả về false
    //     }
    // }

    public function softDeleteRoom($id)
    {
        // Tìm phòng theo ID
        $room = Room::findOrFail($id);

        // Kiểm tra xem room_id có trong bảng residents hay không
        $hasResidents = Resident::where('room_id', $id)->exists();

        if ($hasResidents) {
            // Nếu phòng có người ở, trả về thông báo lỗi
            return [
                'status' => 'error',
                'message' => 'Phòng có người ở, không thể xóa.'
            ];
        }

        // Nếu không có người ở, tiến hành xóa mềm
        $room->delete();

        // Trả về thông báo thành công
        return [
            'status' => 'success',
            'message' => 'Phòng đã được chuyển vào thùng rác thành công.'
        ];
    }



    public function getTrashedRooms()
    {
        return Room::onlyTrashed()->get();
    }

    public function restoreRoom($id)
    {
        $room = Room::withTrashed()->findOrFail($id);
        $room->restore();
        return $room;
    }
    public function restoreMultipleRooms($ids)
    {
        return Room::withTrashed()->whereIn('id', $ids)->restore();
    }
    public function forceDeleteRoom($id)
    {
        $room = Room::withTrashed()->findOrFail($id);
        $room->forceDelete();
        return $room;
    }

    public function getUserResident()
    {
        $user = Auth::user();
        $userResident = Resident::where('user_id', $user->id)->get();
        return $userResident;
    }

    public function processRoomPayment($customer, $accommodation, $pricingId)
    {
        try {
            // Lấy thông tin của gói VIP từ PriceList
            $pricing = PriceList::findOrFail($pricingId);
            $cost = $pricing->price;
            $validity = $pricing->duration_day; // Đây có thể là string

            // Trừ tiền từ số dư tài khoản của người dùng
            $customer->balance -= $cost;
            $customer->save();

            // Cộng thêm thời gian VIP cho phòng
            $currentExpiry = $accommodation->expiration_date ? Carbon::parse($accommodation->expiration_date) : now();

            // Chuyển đổi validity sang int trước khi truyền vào
            $newExpiry = $currentExpiry->addDays((int) $validity); // Đảm bảo validity là kiểu số

            // Cập nhật ngày hết hạn và lưu price_list_id cho phòng
            $accommodation->expiration_date = $newExpiry;
            $accommodation->location_id = $pricing->location->id;
            $accommodation->save();

            // Lưu lịch sử thanh toán
            $lichsu = new Transaction();
            $lichsu->balance = $customer->balance;
            $lichsu->description = 'Thanh toán gói tin VIP';
            $lichsu->added_funds = -$cost;
            $lichsu->total_price = $cost;
            $lichsu->user_id = $customer->id;
            $lichsu->save();

            return true;
        } catch (\Exception $e) {
            // Nếu có lỗi trong quá trình thanh toán, ghi log lỗi
            \Log::error('Lỗi khi thực hiện thanh toán: ' . $e->getMessage());
            return false;
        }
    }

    public function clearZoneId($id)
    {
        $room = Room::findOrFail(id: $id);

        // Thiết lập zone_id thành null
        $room->zone_id = null;
        $room->save(); // Lưu thay đổi vào cơ sở dữ liệu

        return $room; // Trả về phòng đã được cập nhật
    } 
    public function findRoomById($id)
    {
        return Room::findOrFail($id);
    }

    public function updateRoomInZone(Request $request, $id)
    {
        // Tìm phòng theo ID
        $room = Room::findOrFail($id);

        // Cập nhật thông tin phòng
        $room->title = $request->input('title');
        $room->description = $request->input('description');
        $room->price = $request->input('price');
        $room->quantity = $request->input('quantity');
        // $room->phone = $request->input('phone');

        // Tạo slug từ title và id
        $title = $room->title ?? 'default-title';
        $slug = Str::slug($title); // Chuyển title thành slug không dấu, cách nhau bằng dấu '-'
        $room->slug = $slug . '-' . $id;

        // Xử lý hình ảnh nếu có
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($room->image) {
                Storage::disk('public')->delete($room->image);
            }

            // Tạo tên file mới với slug và id
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $slug . '-' . $id . '.' . $extension; // Sử dụng slug để tạo tên file

            // Lưu ảnh mới trực tiếp vào thư mục public
            $imagePath = $request->file('image')->storeAs('', $filename, 'public');
            $room->image = $imagePath;
        }

        // Lưu thay đổi
        $room->save();

        return true;
    }
}
