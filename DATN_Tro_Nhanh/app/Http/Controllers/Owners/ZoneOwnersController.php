<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ZoneServices;
use App\Services\RoomOwnersService;
use App\Http\Requests\ZoneRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Bill;
use App\Events\ZoneCreated; // Import event
use App\Http\Requests\BillRequest;
use Illuminate\Support\Facades\Log;
use App\Models\Image;
use App\Models\Category;
use App\Models\Location;
use App\Models\PriceList;
use App\Models\Zone;
use App\Http\Requests\RoomOwnersRequest;
use App\Events\RoomCreated;
use Illuminate\Support\Facades\Http; // Thêm dòng này để sử dụng Http
use DOMDocument; // Thêm dòng này để sử dụng DOMDocument
use DOMXPath;
class ZoneOwnersController extends Controller
{
    protected $zoneServices;

    protected const show = 2;
    protected const user_is_in = 2;
    protected $roomOwnersService;

    //

    public function __construct(ZoneServices $zoneServices, RoomOwnersService $roomOwnersService)
    {
        $this->zoneServices = $zoneServices;
        $this->roomOwnersService = $roomOwnersService;
    }
    public function index()
    {
        $categories = Category::all();

        $locations = Location::all();
        $zones = $this->zoneServices->getMyZone(Auth::user()->id);

        $userLock = auth()->user();

        // Lấy trạng thái của người dùng hiện tại
        $userStatus = $userLock ? $userLock->status : null;


        return view('owners.create.add-new-zone', compact('categories', 'locations', 'zones', 'userStatus'));
    }
    // Chi tiết khu trọ
    public function showDetailOwners($slug)
    {
        $data = $this->zoneServices->showDetail($slug, self::show);
        // dd($data);
        // dd($data);
        return view('owners.show.dashbroard-zone-detail', [
            'zone' => $data['zone'],
            // 'rooms' => $data['rooms'],
            // 'residents' => $data['residents'],
            // 'user_is_in' => self::user_is_in,
            'slug' => $slug
        ]);
    }
    // Xóa mềm Residents
    public function destroyResident($id)
    {
        $this->zoneServices->softDeleteResident($id);
        return redirect()->back()->with('success', 'Xóa thành công.');
    }
    // Tạo hóa đơn
    public function storeBill(BillRequest $request)
    {
        $this->zoneServices->createBill($request->validated());
        return redirect()->back()->with('success', 'Hóa đơn đã được tạo thành công.');
    }



    public function store(ZoneRequest $request)
    {
        // Log::info('Request Data:', $request->all());
        try {
            if ($request->isMethod('post')) {
                $result = $this->zoneServices->create($request);

                if ($result instanceof \Illuminate\Http\JsonResponse) {
                    return $result;
                } elseif ($result) {
                    event(new RoomCreated($request->all(), $result));

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Phòng trọ đã được tạo thành công.'
                    ]);
                } else {
                    throw new \Exception('Không thể tạo phòng');
                }
            }
        } catch (\Exception $e) {
            Log::error('Lỗi khi tạo phòng: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Đã xảy ra lỗi khi tạo phòng: ' . $e->getMessage()
            ]);
        }
    }

    public function listZone()
    {
        $user_id = Auth::id();
        if (Auth::check() && Auth::user()->role != 1) {
            $zones = $this->zoneServices->getMyZone($user_id);
            // Xử lý yêu cầu không phải AJAX
            return view('owners.show.dashbroard-my-zone', ['zones' => $zones]);
        } else {
            // Nếu người dùng không có quyền, chuyển hướng về trang chính
            return redirect()->route('client.home');
        }
    }
    public function viewUpdate($slug)
    {
        $user_id = Auth::id();
        if (Auth::check() && Auth::user()->role != 1) {
            $zone = $this->zoneServices->getIdZone($slug);
            $categories = Category::all();
            return view('owners.edit.update-zone', ['zone' => $zone, 'categories' => $categories]);
        } else {
            // Nếu người dùng không có quyền, chuyển hướng về trang chính
            return redirect()->route('client.home');
        }
    }
    public function update(ZoneRequest $request, $id)
    {
        if ($request->isMethod('PUT')) {
            try {
                $result = $this->zoneServices->update($request, $id);

                if ($result['success']) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Khu trọ đã được cập nhật thành công.',
                        'redirect' => route('owners.zone-list')
                    ]);
                } else {
                    Log::error('Lỗi khi cập nhật khu trọ: ' . ($result['message'] ?? 'Không có thông báo lỗi'));
                    return response()->json([
                        'success' => false,
                        'message' => $result['message'] ?? 'Đã xảy ra lỗi khi cập nhật khu trọ.'
                    ], 400);
                }
            } catch (\Exception $e) {
                Log::error('Exception khi cập nhật khu trọ: ' . $e->getMessage());
                return response()->json([
                    'success' => false,
                    'message' => 'Đã xảy ra lỗi không mong muốn khi cập nhật khu trọ.'
                ], 500);
            }
        }

        return view('owners.zone-post');
    }

    public function destroy($id)
    {
        $result = $this->zoneServices->softDeleteZones($id);

        if ($result['status'] === 'error') {
            return redirect()->back()->with('error', $result['message']);
        }

        return redirect()->route('owners.trash-zone')->with('success', $result['message']);
    }
    public function destroyy($id)
    {
        $result = $this->zoneServices->softDeleteZoness($id);

        if ($result['status'] === 'error') {
            return redirect()->back()->with('error', $result['message']);
        }

        return redirect()->route('owners.trash-zone')->with('success', $result['message']);
    }


    public function trash()
    {
        $trashedZones = $this->zoneServices->getTrashedZones();
        return view('owners.trash.trash-zone', compact('trashedZones'));
    }

    public function restore($id)
    {
        $this->zoneServices->restoreZones($id);
        return redirect()->route('owners.zone-list')->with('success', 'Khu trọ đã được khôi phục.');
    }

    public function forceDelete($id)
    {
        // Gọi phương thức forceDeleteZones từ service
        $result = $this->zoneServices->forceDeleteZones($id);

        if ($result['status'] === 'error') {
            // Nếu không thể xóa vĩnh viễn do có phòng hoạt động hoặc người ở, quay lại trang hiện tại với thông báo lỗi
            return redirect()->back()->with('error', $result['message']);
        }

        // Nếu xóa vĩnh viễn thành công, chuyển hướng đến trang danh sách khu trọ đã xóa với thông báo thành công
        return redirect()->route('owners.trash-zone')->with('success', 'Khu trọ đã được xóa vĩnh viễn.');
    }
    public function deleteImage($id)
    {
        $image = Image::findOrFail($id);

        // Xóa file ảnh từ thư mục public
        $imagePath = public_path('assets/images/' . $image->filename);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Xóa bản ghi từ database
        $image->delete();

        return response()->json(['success' => true]);
    }

    public function deleteRoomInZone($id)
    {
        $this->roomOwnersService->clearZoneId($id);
        return redirect()->back()->with('success', 'Phòng đã được xóa thành công.');
    }
    public function showDetailRoom($slug)
    {
        $data = $this->roomOwnersService->getRoomBySlug($slug);
        // dd($data);
        // dd($data);
        return view('owners.show.detail-room', [
            'data' => $data,
            // 'rooms' => $data['rooms'],
            // 'residents' => $data['residents'],
            // 'user_is_in' => self::user_is_in,
        ]);
    }

    // Hàm xử lí mua gói vip khu trọ 
    public function processPayment(Request $request)
    {
        // Lấy các giá trị từ request
        $accommodationId = $request->input('zone_id');
        $vipPackageId = $request->input('vipPackage');


        // Lấy thông tin phòng và người dùng hiện tại
        $accommodation = Zone::findOrFail($accommodationId);
        $customer = auth()->user();

        // Lấy thông tin gói VIP từ priceList
        $pricing = PriceList::findOrFail($vipPackageId);
        if (!$pricing) {
            return redirect()->back()->with('alert', [
                'type' => 'error',
                'message' => 'Không có gói VIP nào để thanh toán.'
            ]);
        }
        $cost = $pricing->price;

        // Kiểm tra số dư tài khoản của user
        if ($customer->balance < $cost) {
            \Log::warning('Số dư tài khoản không đủ để thanh toán. User ID: ' . $customer->id);
            return redirect()->back()->with('alert', [
                'type' => 'error',
                'message' => 'Số dư tài khoản không đủ để thanh toán.'
            ]);
        }


        // Gọi service để thực hiện thanh toán
        $paymentStatus = $this->zoneServices->processZonePayment($customer, $accommodation, $vipPackageId);

        if ($paymentStatus) {
            return redirect()->back()->with('alert', [
                'type' => 'success',
                'message' => 'Thanh toán thành công và gói VIP đã được kích hoạt.'
            ]);
        } else {
            \Log::error('Thanh toán không thành công. User ID: ' . $customer->id . ', Zone ID: ' . $accommodationId);
            return redirect()->back()->with('alert', [
                'type' => 'error',
                'message' => 'Có lỗi xảy ra trong quá trình thanh toán.'
            ]);
        }
    }
    // public function getData() {
    //     set_time_limit(0); // Không giới hạn thời gian thực thi
    
    //     // Bước 1: Lấy nội dung từ trang chính
    //     $baseUrl = 'https://tromoi.com/phong-tro'; // URL chính
    //     $html = @file_get_contents($baseUrl); // Lấy nội dung HTML
    
    //     if ($html === false) {
    //         echo "Không thể lấy nội dung từ URL: $baseUrl";
    //         return;
    //     }
    
    //     // Bước 2: Tạo đối tượng DOMDocument để phân tích cú pháp HTML
    //     $dom = new DOMDocument();
    //     @$dom->loadHTML($html); // Sử dụng @ để bỏ qua cảnh báo
    
    //     // Bước 3: Tạo đối tượng DOMXPath để truy vấn
    //     $xpath = new DOMXPath($dom);
        
    //     // Lấy tất cả các thẻ <div> với class "hostel-item"
    //     $hostelItems = $xpath->query('//div[contains(@class, "hostel-item")]');
    
    //     // Mảng để theo dõi các link đã lấy
    //     $seenLinks = [];
    
    //     // Duyệt qua từng nhà trọ
    //     foreach ($hostelItems as $item) {
    //         // Lấy link chi tiết
    //         $linkElement = $xpath->query('.//a[contains(@class, "hostel-item__link")]', $item);
    //         $detailLink = $linkElement->length > 0 ? $linkElement[0]->getAttribute('href') : '';
    
    //         // Chỉ in ra thông tin nếu có link và chưa được lấy
    //         if ($detailLink && !in_array($detailLink, $seenLinks)) {
    //             // Thêm link vào mảng đã thấy
    //             $seenLinks[] = $detailLink;
    
    //             // Gọi hàm để lấy thông tin chi tiết từ link
    //             $this->getHostelDetails($detailLink);
    //         }
    //     }
    // }
    
    // private function getHostelDetails($url) {
    //     // Lấy nội dung từ link chi tiết
    //     $html = @file_get_contents($url);
    //     if ($html === false) {
    //         echo "Không thể lấy nội dung từ URL: $url<br>";
    //         return;
    //     }
    
    //     // Tạo đối tượng DOMDocument để phân tích cú pháp HTML
    //     $dom = new DOMDocument();
    //     @$dom->loadHTML($html);
    //     $xpath = new DOMXPath($dom);
    
    //     // Lấy tiêu đề
    //     $titleElement = $xpath->query('//h1[@class="box-title"]');
    //     $title = $titleElement->length > 0 ? htmlspecialchars($titleElement[0]->textContent) : 'Không có tiêu đề';
    
    //     // Lấy hình ảnh đầu tiên
    //     $imageElement = $xpath->query('//div[contains(@class, "hostel__detail--frame")]//img');
    //     $imageSrc = $imageElement->length > 0 ? $imageElement[0]->getAttribute('src') : 'Không có hình ảnh';
    
    //     // Lấy giá
    //     $priceElement = $xpath->query('//div[contains(@class, "hostel__detail--price")]//div[@class="value"]');
    //     $price = $priceElement->length > 0 ? preg_replace('/[^0-9]/', '', $priceElement[0]->textContent) : 'Không có giá';
    
    //     // Lấy số điện thoại
    //     $phoneElement = $xpath->query('//div[contains(@class, "hostel__detail--host")]//a[contains(@class, "button btn-cta")]');
    //     $phone = $phoneElement->length > 0 ? htmlspecialchars($phoneElement[0]->textContent) : 'Không có số điện thoại';
    
    //     // Lấy mô tả
    //     $descriptionElement = $xpath->query('//div[contains(@class, "content-detail")]');
    //     $description = $descriptionElement->length > 0 ? htmlspecialchars($descriptionElement[0]->textContent) : 'Không có mô tả';
    
    //     // In ra thông tin
    //     echo "Tiêu đề: $title<br>";
    //     echo "Hình ảnh: <img src='$imageSrc' alt='$title'><br>";
    //     echo "Giá: $price VND<br>";
    //     echo "Số điện thoại: $phone<br>";
    //     echo "Mô tả: $description<br><br>";
    // }
    // public function getData() {
    //     set_time_limit(0); // Không giới hạn thời gian thực thi
    
    //     // Bước 1: Lấy nội dung từ trang chính
    //     $baseUrl = 'https://tromoi.com/phong-tro'; // URL chính
    //     $html = @file_get_contents($baseUrl); // Lấy nội dung HTML
    
    //     if ($html === false) {
    //         echo "Không thể lấy nội dung từ URL: $baseUrl";
    //         return;
    //     }
    
    //     // Bước 2: Tạo đối tượng DOMDocument để phân tích cú pháp HTML
    //     $dom = new DOMDocument();
    //     @$dom->loadHTML($html); // Sử dụng @ để bỏ qua cảnh báo
    
    //     // Bước 3: Tạo đối tượng DOMXPath để truy vấn
    //     $xpath = new DOMXPath($dom);
        
    //     // Lấy tất cả các thẻ <div> với class "hostel-item"
    //     $hostelItems = $xpath->query('//div[contains(@class, "hostel-item")]');
    
    //     // Mảng để theo dõi các link đã lấy
    //     $seenLinks = [];
    
    //     // Duyệt qua từng nhà trọ
    //     foreach ($hostelItems as $item) {
    //         // Lấy link chi tiết
    //         $linkElement = $xpath->query('.//a[contains(@class, "hostel-item__link")]', $item);
    //         $detailLink = $linkElement->length > 0 ? $linkElement[0]->getAttribute('href') : '';
    
    //         // Chỉ in ra thông tin nếu có link và chưa được lấy
    //         if ($detailLink && !in_array($detailLink, $seenLinks)) {
    //             // Thêm link vào mảng đã thấy
    //             $seenLinks[] = $detailLink;
    
    //             // Gọi hàm để lấy thông tin chi tiết từ link
    //             $this->getHostelDetails($detailLink);
    //         }
    //     }
    // }
    
    // private function getHostelDetails($url) {
    //     // Lấy nội dung từ link chi tiết
    //     $html = @file_get_contents($url);
    //     if ($html === false) {
    //         echo "Không thể lấy nội dung từ URL: $url<br>";
    //         return;
    //     }
    
    //     // Tạo đối tượng DOMDocument để phân tích cú pháp HTML
    //     $dom = new DOMDocument();
    //     @$dom->loadHTML($html);
    //     $xpath = new DOMXPath($dom);
    
    //     // Lấy tiêu đề
    //     $titleElement = $xpath->query('//h1[@class="box-title"]');
    //     $title = $titleElement->length > 0 ? htmlspecialchars($titleElement[0]->textContent) : 'Không có tiêu đề';
    
    //     // Lấy hình ảnh đầu tiên
    //     $imageElement = $xpath->query('//div[contains(@class, "hostel__detail--frame")]//img');
    //     $imageSrc = $imageElement->length > 0 ? $imageElement[0]->getAttribute('src') : 'Không có hình ảnh';
    
    //     // Lấy giá
    //     $priceElement = $xpath->query('//div[contains(@class, "hostel__detail--price")]//div[@class="value"]');
    //     $price = $priceElement->length > 0 ? preg_replace('/[^0-9]/', '', $priceElement[0]->textContent) : 'Không có giá';
    
    //     // Lấy số điện thoại
    //     $phoneElement = $xpath->query('//div[contains(@class, "hostel__detail--host")]//a[contains(@class, "button btn-cta")]');
    //     $phone = $phoneElement->length > 0 ? htmlspecialchars($phoneElement[0]->textContent) : 'Không có số điện thoại';
    
    //     // Lấy mô tả
    //     $descriptionElement = $xpath->query('//div[contains(@class, "content-detail")]');
    //     $description = $descriptionElement->length > 0 ? htmlspecialchars($descriptionElement[0]->textContent) : 'Không có mô tả';
    
    //     // In ra thông tin chi tiết sản phẩm
    //     echo "<h2>Thông tin chi tiết sản phẩm:</h2>";
    //     echo "Tiêu đề: $title<br>";
    //     echo "Hình ảnh: <img src='$imageSrc' alt='$title' style='max-width: 200px;'><br>";
    //     echo "Giá: $price VND<br>";
    //     echo "Số điện thoại: $phone<br>";
    //     echo "Mô tả: $description<br><br>";
    // }
    public function getData() {
        set_time_limit(0); // Không giới hạn thời gian thực thi
    
        // Bước 1: Lấy nội dung từ trang chính
        $baseUrl = 'https://tromoi.com/phong-tro?_url=%2Fphong-tro&page=2'; // URL chính
        $html = @file_get_contents($baseUrl); // Lấy nội dung HTML
    
        if ($html === false) {
            echo "Không thể lấy nội dung từ URL: $baseUrl";
            return;
        }
    
        // Bước 2: Tạo đối tượng DOMDocument để phân tích cú pháp HTML
        $dom = new DOMDocument();
        @$dom->loadHTML($html); // Sử dụng @ để bỏ qua cảnh báo
    
        // Bước 3: Tạo đối tượng DOMXPath để truy vấn
        $xpath = new DOMXPath($dom);
        
        // Lấy tất cả các thẻ <div> với class "hostel-item"
        $hostelItems = $xpath->query('//div[contains(@class, "hostel-item")]');
    
        // Mảng để theo dõi các link đã lấy
        $seenLinks = [];
    
        // Duyệt qua từng nhà trọ
        foreach ($hostelItems as $item) {
            // Lấy link chi tiết
            $linkElement = $xpath->query('.//a[contains(@class, "hostel-item__link")]', $item);
            $detailLink = $linkElement->length > 0 ? $linkElement[0]->getAttribute('href') : '';
    
            // Chỉ in ra thông tin nếu có link và chưa được lấy
            if ($detailLink && !in_array($detailLink, $seenLinks)) {
                // Thêm link vào mảng đã thấy
                $seenLinks[] = $detailLink;
    
                // Gọi hàm để lấy thông tin chi tiết từ link
                $this->getHostelDetails($detailLink);
            }
        }
    }
    
    private function getHostelDetails($url) {
        // Lấy nội dung từ link chi tiết
        $html = @file_get_contents($url);
        if ($html === false) {
            echo "Không thể lấy nội dung từ URL: $url<br>";
            return;
        }
    
        // Tạo đối tượng DOMDocument để phân tích cú pháp HTML
        $dom = new DOMDocument();
        @$dom->loadHTML($html);
        $xpath = new DOMXPath($dom);
    
        // Lấy tiêu đề
        $titleElement = $xpath->query('//h1[@class="box-title"]');
        $title = $titleElement->length > 0 ? htmlspecialchars($titleElement[0]->textContent) : 'Không có tiêu đề';
    
        // Lấy hình ảnh đầu tiên
        $imageElement = $xpath->query('//div[contains(@class, "hostel__detail--frame")]//img');
        $imageSrc = $imageElement->length > 0 ? $imageElement[0]->getAttribute('src') : 'Không có hình ảnh';
    
        // Lấy giá
        $priceElement = $xpath->query('//div[contains(@class, "hostel__detail--price")]//div[@class="value"]');
        $price = $priceElement->length > 0 ? preg_replace('/[^0-9]/', '', $priceElement[0]->textContent) : 'Không có giá';
    
        // Lấy số điện thoại
        $phoneElement = $xpath->query('//div[contains(@class, "hostel__detail--host")]//a[contains(@class, "button btn-cta")]');
        $phone = $phoneElement->length > 0 ? htmlspecialchars($phoneElement[0]->textContent) : 'Không có số điện thoại';
    
        // Lấy mô tả
        $descriptionElement = $xpath->query('//div[contains(@class, "content-detail")]');
        $description = $descriptionElement->length > 0 ? htmlspecialchars($descriptionElement[0]->textContent) : 'Không có mô tả';
    
        // In ra thông tin chi tiết sản phẩm
        echo "<h2>Thông tin chi tiết sản phẩm:</h2>";
        echo "Tiêu đề: $title<br>";
        echo "Hình ảnh: <img src='$imageSrc' alt='$title' style='max-width: 200px;'><br>";
        echo "Giá: $price VND<br>";
        echo "Số điện thoại: $phone<br>";
        echo "Mô tả: $description<br><br>";
    
        // Thêm dữ liệu vào cơ sở dữ liệu
        $data = [
            'title' => $title,
            'description' => $description,
            'image' => $imageSrc,
            'price' => $price,
            'phone' => $phone,
             // Tạo slug từ tiêu đề
            'created_at' => now(), // Thay thế bằng thời gian hiện tại
            'updated_at' => now(), // Thay thế bằng thời gian hiện tại
        ];
    
        // Giả định bạn có một dịch vụ để thêm dữ liệu vào cơ sở dữ liệu
        $result = $this->zoneServices->createMultiple($data);
    
        // Kiểm tra kết quả và in ra thông báo
        if ($result) {
            echo "Thành công: Dữ liệu đã được thêm vào cơ sở dữ liệu.<br>";
        } else {
            echo "Thất bại: Không thể thêm dữ liệu vào cơ sở dữ liệu.<br>";
        }
    }
}
