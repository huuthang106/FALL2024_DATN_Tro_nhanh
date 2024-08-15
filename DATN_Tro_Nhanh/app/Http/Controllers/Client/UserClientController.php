<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;  
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;  // Import Exception

class UserClientController extends Controller
{
    public function login()
    {
        return view('client.show.login');
    }

    public function register()
    {
        return view('client.create.register');
    }

    public function fogot()
    {
        return view('client.edit.password-recovery');
    }

    // Giao diện Danh Sách Người Đăng Tin
    public function indexAgent()
    {
        return view('client.show.agents-grid-2');
    }

    // Giao diện Chi Tiết Người Đăng Tin
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
            $google_user = Socialite::driver('google')->user();
            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                $user = User::where('email', $google_user->getEmail())->first();

                if (!$user) {
                    $new_user = User::create([
                        'name' => $google_user->getName(),
                        'email' => $google_user->getEmail(),
                        'google_id' => $google_user->getId(),
                        'password' => bcrypt('123456dummy'),
                    ]);
                    Auth::login($new_user);
                } else {
                    $user->update([
                        'google_id' => $google_user->getId(),
                    ]);

                    Auth::login($user);
                }
            } else {
                Auth::login($user);
            }

            return redirect()->route('home');

        } catch (\Throwable $th) {
            dd('Có lỗi xảy ra', $th->getMessage());
        }
    }

}
