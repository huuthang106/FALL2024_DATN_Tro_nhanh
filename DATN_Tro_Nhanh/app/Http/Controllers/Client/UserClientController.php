<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Auth;
use App\Services\RegisterService;
use App\Services\LoginService;
use Illuminate\Validation\ValidationException;
use App\Services\SocialAuthService;


use App\Services\UserClientServices;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\CommentClientService;
use App\Services\WatchListOwner;

class UserClientController extends Controller
{
    private const role_owners = 2;
    private const limit = 8;

    protected $userClientServices;
    protected $registerService;
    protected $loginService;
    protected $socialAuthService;
    protected $commentClientService;
    protected $watchListOwner;
    public function __construct(UserClientServices $userClientServices, RegisterService $registerService, LoginService $loginService, SocialAuthService $socialAuthService, CommentClientService $commentClientService, WatchListOwner $watchListOwner)
    {
        $this->userClientServices = $userClientServices;
        $this->registerService = $registerService;
        $this->loginService = $loginService;
        $this->socialAuthService = $socialAuthService;
        $this->commentClientService = $commentClientService;
        $this->watchListOwner = $watchListOwner;
    }

    public function login()
    {
        return view('client.show.login');
    }

    public function register()
    {
        return view('client.create.register');
    }

    public function recovery_password()
    {
        return view('client.edit.password-recovery');
    }

    // Giao diện Danh Sách Người Đăng Tin
    public function indexAgent(Request $request)
    {
        $searchTerm = $request->input('search');
        $province = $request->input('province');
        $district = $request->input('district');
        $village = $request->input('village');
        $locations = $this->userClientServices->getUniqueLocations();

        $users = $this->userClientServices->getUsersByRole(self::role_owners, $searchTerm, self::limit, $province,  $district, $village);
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'users' => $users,
                'searchTerm' => $searchTerm,
                'province' => $province,
                'district' => $district,
                'village' => $village,
            ]);
        }


        return view('client.show.list-owners', [
            'users' => $users,
            'searchTerm' => $searchTerm,
            'province' => $province,
            'district' => $district,
            'village' => $village,
            'provinces' => $locations['provinces'],
            'districts' => $locations['districts'],
            'villages' => $locations['villages']
        ]);
    }




    public function indexAgentJson(Request $request)
    {


        $users = $this->userClientServices->getUsersByRoleNoLimit(self::role_owners);

        return response()->json([
            'users' => $users,

        ]);
    }

    // public function agentDetail($slug)
    // {
    //     // Get user details and ratings from the service
    //     $userDetails = $this->commentClientService->getUserDetailsWithRatings($slug);
    //     $user = User::where('slug', $slug)->first();
    //     $comments = $userDetails['comments'];
    //     // Check if user exists in the returned array
    //     if (!$userDetails['user']) {
    //         abort(404, 'Người dùng không tìm thấy');
    //     }
    //     //kiểm tra xem đã follow chưa 
    //     $currentUserId = Auth::id(); // Lấy ID của người dùng hiện tại
    //     $isFollowing = false;
    //     if ($currentUserId) {
    //         $isFollowing = $this->watchListOwner->checkFollowing($user->id, $currentUserId);
    //     }

    //     // Lấy tất cả tin đăng phòng trọ của người dùng này
    //     // $rooms = $user->rooms;
    //     $rooms = $user->rooms()->paginate(6); // Số phòng hiển thị trên mỗi trang là 6
    //     $zones = $user->zones()->paginate(6);
    //     // Đếm tổng số phòng và khu trọ của người dùng này
    //     // $totalRooms = $rooms->count();
    //     $totalRooms = $user->rooms()->count();
    //     $totalZones = $user->zones()->count();
    //     // Lấy tổng số phòng và số phòng tắm từ bảng utilities
    //     // $totalRooms = $rooms->count();
    //     foreach ($rooms as $room) {
    //         $room->bathrooms = $room->utility ? $room->utility->bathrooms : 0;
    //     }
    //     // Tính tổng cả rooms và zones
    //     $totalProperties = $totalRooms + $totalZones;
    //     return view('client.show.agent-details-1', array_merge(
    //         compact('user', 'rooms', 'zones', 'totalRooms', 'totalZones', 'totalProperties', 'isFollowing'),
    //         [
    //             'user' => $userDetails['user'],
    //             'averageRating' => $userDetails['averageRating'],
    //             'ratingsDistribution' => $userDetails['ratingsDistribution'],
    //             'comments' => $userDetails['comments']
    //         ]
    //     ));


    //     // Pass all the relevant data to the view

    // }
    // public function agentDetail($slug)
    // {
    //     // Get user details and ratings from the service
    //     $userDetails = $this->commentClientService->getUserDetailsWithRatings($slug);
    //     $user = User::where('slug', $slug)->first();
    //     $comments = $userDetails['comments'];

    //     // Check if user exists in the returned array
    //     if (!$userDetails['user']) {
    //         abort(404, 'Người dùng không tìm thấy');
    //     }

    //     // Kiểm tra xem đã follow chưa 
    //     $currentUserId = Auth::id(); // Lấy ID của người dùng hiện tại
    //     $isFollowing = false;
    //     if ($currentUserId) {
    //         $isFollowing = $this->watchListOwner->checkFollowing($user->id, $currentUserId);
    //     }

    //     // Lấy tất cả tin đăng phòng trọ của người dùng này
    //     $rooms = $user->rooms()->paginate(6); // Số phòng hiển thị trên mỗi trang là 6
    //     $zones = $user->zones()->paginate(6);

    //     // Đếm tổng số phòng và khu trọ của người dùng này
    //     $totalRooms = $user->rooms()->count();
    //     $totalZones = $user->zones()->count();

    //     // Lấy tổng số phòng và số phòng tắm từ bảng utilities
    //     foreach ($rooms as $room) {
    //         $room->bathrooms = $room->utility ? $room->utility->bathrooms : 0;
    //     }

    //     // Tính tổng cả rooms và zones
    //     $totalProperties = $totalRooms + $totalZones;
    //     // Kiểm tra xem yêu cầu có phải là AJAX hay không
    //     if (request()->ajax() || request()->wantsJson()) {
    //         return response()->json([
    //             'user' => $userDetails['user'],
    //             'averageRating' => $userDetails['averageRating'],
    //             'ratingsDistribution' => $userDetails['ratingsDistribution'],
    //             'comments' => $comments,
    //             'rooms' => $rooms,
    //             'zones' => $zones,
    //             'totalRooms' => $totalRooms,
    //             'totalZones' => $totalZones,
    //             'totalProperties' => $totalProperties,
    //             'isFollowing' => $isFollowing,
    //         ]);
    //     }
    //     // Nếu không phải là AJAX, trả về view
    //     return view('client.show.agent-details-1', array_merge(
    //         compact('user', 'rooms', 'zones', 'totalRooms', 'totalZones', 'totalProperties', 'isFollowing'),
    //         [
    //             'user' => $userDetails['user'],
    //             'averageRating' => $userDetails['averageRating'],
    //             'ratingsDistribution' => $userDetails['ratingsDistribution'],
    //             'comments' => $userDetails['comments']
    //         ]
    //     ));
    // }
    public function agentDetail($slug)
    {
        $userDetails = $this->commentClientService->getUserDetailsWithRatings($slug);
        $user = User::where('slug', $slug)->first();
        $comments = $userDetails['comments'];
    
        if (!$userDetails['user']) {
            abort(404, 'Người dùng không tìm thấy');
        }
    
        $currentUserId = Auth::id();
        $isFollowing = false;
        if ($currentUserId) {
            $isFollowing = $this->watchListOwner->checkFollowing($user->id, $currentUserId);
        }
    
        $zones = $user->zones()->paginate(6);
        $totalZones = $user->zones()->count();
        $totalProperties = $totalZones;
        
        return view('client.show.agent-details-1', array_merge(
            compact('user', 'zones', 'totalZones', 'totalProperties', 'isFollowing'),
            [
                'user' => $userDetails['user'],
                'averageRatings' => $userDetails['averageRating'],
                'ratingsDistribution' => $userDetails['ratingsDistribution'],
                'comments' => $userDetails['comments'],
            ]
        ));
    }
    public function agentDetails($slug)
    {
        $userDetails = $this->commentClientService->getUserDetailsWithRatings($slug);
        $user = User::where('slug', $slug)->first();
        $comments = $userDetails['comments'];
    
        if (!$userDetails['user']) {
            abort(404, 'Người dùng không tìm thấy');
        }
    
        $currentUserId = Auth::id();
        $isFollowing = false;
        if ($currentUserId) {
            $isFollowing = $this->watchListOwner->checkFollowing($user->id, $currentUserId);
        }
    
        $zones = $user->zones()->paginate(6);
        $totalZones = $user->zones()->count();
        $totalProperties = $totalZones;
        

        return response()->json([
            'user' => $userDetails['user'],
            'averageRating' => $userDetails['averageRating'],
            'ratingsDistribution' => $userDetails['ratingsDistribution'],
            'comments' => $comments,
            
            'zones' => $zones,
           
            'totalZones' => $totalZones,
            'totalProperties' => $totalProperties,
            'isFollowing' => $isFollowing,
        ]);
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->with(['cancel_url' => route('client.cancel')])
            ->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $this->socialAuthService->handleGoogleCallback();
            return redirect()->route('home')->with('success', 'Đăng nhập thành công bằng Google!');
        } catch (\Exception $e) {
            if ($e->getCode() == 100) { // Mã lỗi tùy chỉnh cho việc hủy đăng nhập
                return redirect()->route('client.cancel');
            }
            return redirect()->route('client.home')->withErrors(['error' => 'Có lỗi xảy ra khi đăng nhập bằng Google. Vui lòng thử lại.']);
        }
    }
    public function handleGoogleCancel()
    {
        return redirect()->route('home')->with('info', 'Bạn đã hủy đăng nhập bằng Google. Vui lòng thử lại nếu bạn muốn đăng nhập.');
    }

    public function register_user(RegisterRequest $request)
    {
        try {
            $user = $this->registerService->register($request->all());
            Auth::login($user);

            return response()->json(['redirect' => route('client.home')]);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function login_user(LoginRequest $request)
    {
        try {
            $request->authenticate();
            $redirectUrl = url()->previous();

            return response()->json(['redirect' => $redirectUrl]);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Kích hoạt sự kiện logout-event
        echo "<script>localStorage.setItem('logout-event', Date.now()); window.location.href = '" . route('client.home') . "';</script>";
    }
}
