<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //     $request->validate([
        //         'token' => ['required'],
        //         'email' => ['required', 'email'],
        //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //     ]);

        //     // Here we will attempt to reset the user's password. If it is successful we
        //     // will update the password on an actual user model and persist it to the
        //     // database. Otherwise we will parse the error and return the response.
        //     $status = Password::reset(
        //         $request->only('email', 'password', 'password_confirmation', 'token'),
        //         function ($user) use ($request) {
        //             $user->forceFill([
        //                 'password' => Hash::make($request->password),
        //                 'remember_token' => Str::random(60),
        //             ])->save();

        //             event(new PasswordReset($user));
        //         }
        //     );

        //     // If the password was successfully reset, we will redirect the user back to
        //     // the application's home authenticated view. If there is an error we can
        //     // redirect them back to where they came from with their error message.
        //     return $status == Password::PASSWORD_RESET
        //                 ? redirect()->route('login')->with('status', __($status))
        //                 : back()->withInput($request->only('email'))
        //                         ->withErrors(['email' => __($status)]);
        // }
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Attempt to reset the user's password
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // Check if the password was successfully reset
        if ($status == Password::PASSWORD_RESET) {
            // Đăng nhập người dùng ngay lập tức
            $user = \App\Models\User::where('email', $request->email)->first();
            Auth::login($user);
            // return redirect()->route('/')->with('status', __('passwords.reset'));
        }

        // Handle errors
        $errorMessages = [
            Password::INVALID_TOKEN => __('passwords.token'),
            Password::INVALID_USER => __('passwords.user'),
            Password::RESET_THROTTLED => __('passwords.throttled'),
        ];

        $errorMessage = $errorMessages[$status] ?? __('passwords.token');

        throw ValidationException::withMessages([
            'email' => $errorMessage,
        ]);
    }
}
