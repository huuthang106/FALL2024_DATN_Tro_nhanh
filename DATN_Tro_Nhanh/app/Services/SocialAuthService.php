<?php

namespace App\Services;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class SocialAuthService
{
    /**
     * Handle Google OAuth callback and login the user.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
              // Kiểm tra xem người dùng đã hủy quá trình đăng nhập chưa
        if (request()->has('error') && request()->get('error') == 'access_denied') {
            Log::info('Người dùng đã hủy đăng nhập Google');
            throw new \Exception('Đăng nhập bằng Google đã bị hủy bởi người dùng');
        }

        // Kiểm tra xem có tham số 'code' trong request không
        if (!request()->has('code')) {
            Log::error('Google callback: Thiếu tham số code');
            throw new \Exception('Thiếu tham số xác thực từ Google');
        }

        $google_user = Socialite::driver('google')->user();
        
            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                $user = User::where('email', $google_user->getEmail())->first();

                if (!$user) {
                    $user = User::create([
                        'name' => $google_user->getName(),
                        'email' => $google_user->getEmail(),
                        'google_id' => $google_user->getId(),
                        'password' => bcrypt('123456dummy'),
                    ]);
                }
                $user->slug = Str::slug($google_user->getName() . '-' . $google_user->getId());
                $user->save();
            } else {
                // Update existing user with google_id
                $user->update([
                    'google_id' => $google_user->getId(),
                    'slug' => $user->slug ?: Str::slug($google_user->getName() . '-' . $google_user->getId()),
                ]);
            }

            Auth::login($user);

        } catch (\Throwable $th) {
            throw new \Exception('Có lỗi xảy ra khi đăng nhập bằng Google: ' . $th->getMessage());
        }
    }
}
