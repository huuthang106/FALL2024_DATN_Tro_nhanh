<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\RegisterService;
use App\Services\LoginService;
use Illuminate\Validation\ValidationException;
use App\Services\SocialAuthService;

class UserClientController extends Controller
{
    protected $registerService;
    protected $loginService;
    protected $socialAuthService;

    public function __construct(RegisterService $registerService, LoginService $loginService, SocialAuthService $socialAuthService)
    {
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

    public function indexAgent()
    {
        return view('client.show.agents-grid-2');
    }

    public function agentDetail()
    {
        return view('client.show.agent-details-1');
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

    public function register_user(Request $request)
    {
        try {
            $user = $this->registerService->register($request->all());
            Auth::login($user);

            return redirect()->route('home')->with('success', 'Registration successful!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
    public function login_user(Request $request)
    {
        $credentials = $request->only('email', 'password');


        try {
            $this->loginService->validateLogin($credentials);

            if (Auth::attempt($credentials)) {
                return redirect()->intended('/')->with('success', 'Login successful!');
            } else {
                return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
            }
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
