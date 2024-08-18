<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
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
class UserClientController extends Controller
{
    protected $userClientServices;
    protected $registerService;
    protected $loginService;
    protected $socialAuthService;
    public function __construct(UserClientServices $userClientServices, RegisterService $registerService, LoginService $loginService, SocialAuthService $socialAuthService)
    {
        $this->userClientServices = $userClientServices;
        $this->registerService = $registerService;
        $this->loginService = $loginService;
        $this->socialAuthService = $socialAuthService;
    }

    public function login()
    {
        return view('client.show.login');
    }

    public function register()
    {
        return view('client.create.register');
    }

    public function forgot()
    {
        return view('client.edit.password-recovery');
    }

    // Giao diện Danh Sách Người Đăng Tin
    public function indexAgent()
    {
        $users = $this->userClientServices->getUsersByRole(2);
        return view('client.show.agents-grid-2', compact('users'));
    }



    public function agentDetail($slug)
    {
        $user = User::where('slug', $slug)->first();
        if (!$user) {
            abort(404, 'Người dùng không tìm thấy');
        }
        return view('client.show.agent-details-1', compact('user'));
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
    
            return response()->json(['redirect' => route('client.home')]);
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
