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

        $users = $this->userClientServices->getUsersByRole(self::role_owners, $searchTerm, self::limit, $province,  $district, $village);

        return view('client.show.list-owners', compact('users'));
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
    public function agentDetail($slug)
{
    // Get user details and ratings from the service
    $userDetails = $this->commentClientService->getUserDetailsWithRatings($slug);
    $user = User::where('slug', $slug)->first();
    $comments = $userDetails['comments'];

    // Check if user exists in the returned array
    if (!$userDetails['user']) {
        abort(404, 'Người dùng không tìm thấy');
    }

    // Kiểm tra xem đã follow chưa 
    $currentUserId = Auth::id(); // Lấy ID của người dùng hiện tại
    $isFollowing = false;
    if ($currentUserId) {
        $isFollowing = $this->watchListOwner->checkFollowing($user->id, $currentUserId);
    }

    // Lấy tất cả tin đăng phòng trọ của người dùng này
    $rooms = $user->rooms()->paginate(6); // Số phòng hiển thị trên mỗi trang là 6
    $zones = $user->zones()->paginate(6);

    // Đếm tổng số phòng và khu trọ của người dùng này
    $totalRooms = $user->rooms()->count();
    $totalZones = $user->zones()->count();

    // Lấy tổng số phòng và số phòng tắm từ bảng utilities
    foreach ($rooms as $room) {
        $room->bathrooms = $room->utility ? $room->utility->bathrooms : 0;
    }

    // Tính tổng cả rooms và zones
    $totalProperties = $totalRooms + $totalZones;

    return view('client.show.agent-details-1', array_merge(
        compact('user', 'rooms', 'zones', 'totalRooms', 'totalZones', 'totalProperties', 'isFollowing'),
        [
            'user' => $userDetails['user'],
            'averageRating' => $userDetails['averageRating'],
            'ratingsDistribution' => $userDetails['ratingsDistribution'],
            'comments' => $userDetails['comments']
        ]
    ));
}

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $this->socialAuthService->handleGoogleCallback();
            return redirect()->route('home')->with('success', 'Login successful with Google!');
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['error' => $e->getMessage()]);
        }
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

    public function logout()
    {
        Auth::logout();

        // Invalidate the session
        request()->session()->invalidate();

        // Regenerate the session token to prevent session fixation attacks
        request()->session()->regenerateToken();

        // Chuyển hướng về trang chủ
        return redirect('/');
    }
}
