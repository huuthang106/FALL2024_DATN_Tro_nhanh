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
    // dd($request->all());
    try {
        $validatedData = $request->validate([
            'cmnd_number' => 'required|string',
            'full_name' => 'required|string',
            'gender' => 'required|string',
        ]);

        // Chuyển đổi giá trị giới tính từ văn bản thành số
        $gender = $validatedData['gender'];
        switch (strtolower($gender)) {
            case 'nam':
                $gender = 1;
                break;
            case 'nữ':
                $gender = 2;
                break;
            default:
                $gender = null; // Hoặc xử lý lỗi nếu giá trị không phải 'nam' hoặc 'nữ'
                break;
        }
        
        $imagePaths = session()->get('image_paths', []);

        $data = [
            'identification_number' => $validatedData['cmnd_number'],
            'name' => $validatedData['full_name'],
            'gender' => $gender,
            'user_id' => auth()->id(),
        ];

        $images = [
            'cccdmt_filename' => $imagePaths['cccdmt_filename'] ?? null,
            'cccdms_filename' => $imagePaths['cccdms_filename'] ?? null,
            'fileface_filename' => $imagePaths['fileface_filename'] ?? null,
        ];

        // Đảm bảo registrationService được khởi tạo đúng cách
        if (is_null($this->IdentityService)) {
            throw new \Exception('RegistrationService không được khởi tạo.');
        }

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
