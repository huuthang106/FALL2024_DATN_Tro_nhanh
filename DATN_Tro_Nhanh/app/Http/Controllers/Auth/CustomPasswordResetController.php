<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use Illuminate\Support\Facades\Queue;
use App\Jobs\SendPasswordResetEmail;
use App\Http\Requests\Auth\SendPasswordResetLinkRequest;
use Illuminate\Validation\ValidationException;
use App\Mail\CustomPasswordResetMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\JsonResponse;

class CustomPasswordResetController extends Controller
{
    //
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(SendPasswordResetLinkRequest $request): JsonResponse
    {
        // Gửi phản hồi ngay lập tức
        $status = Password::RESET_LINK_SENT;
        // Trả về phản hồi JSON
        try {
            // Đưa công việc gửi email vào hàng đợi
            Queue::push(new SendPasswordResetEmail($request->only('email')));
            // Trả về phản hồi redirect thành công
            // return redirect()->back()->with('status', __('Chúng tôi đã gửi liên kết đặt lại mật khẩu đến email của bạn!'));
            return response()->json(['status' => __('Chúng tôi đã gửi liên kết đặt lại mật khẩu đến email của bạn!')]);
        } catch (\Exception $e) {
            // Xử lý lỗi gửi email
            return response()->json(['error', __('Có lỗi xảy ra khi gửi email. Vui lòng thử lại sau.')]);
        }
        // Gửi mail giao diện tự làm
        // // Test Mail
        // $status = Password::sendResetLink($request->only('email'));

        // if ($status == Password::RESET_LINK_SENT) {
        //     return response()->json(['status' => __('Chúng tôi đã gửi liên kết đặt lại mật khẩu đến email của bạn!')]);
        // } else {
        //     throw ValidationException::withMessages([
        //         'email' => __($status),
        //     ]);
        // }
    }
}
