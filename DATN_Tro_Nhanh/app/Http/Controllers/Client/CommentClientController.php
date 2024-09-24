<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\RatingZoneRequest;
use App\Http\Requests\CommentBlogRequest;
use App\Http\Requests\UserRequest;
use App\Services\CommentClientService;
use Illuminate\Support\Facades\Auth;

class CommentClientController extends Controller
{
    protected $CommentClientService;

    public function __construct(CommentClientService $CommentClientService)
    {
        $this->CommentClientService = $CommentClientService;
    }

    public function submitReview(CommentRequest $request)
    {
        $validated = $request->validated();

        // Kiểm tra xem room_slug có được truyền đúng không
        if (!$request->has('room_slug')) {
            return response()->json(['success' => false, 'message' => 'Phòng không hợp lệ.'], 400);
        }

        $validated['room_slug'] = $request->input('room_slug');

        $review = $this->CommentClientService->submitReview($validated);

        if ($review) {
            return response()->json(['success' => true, 'message' => 'Đánh giá của bạn đã được gửi thành công!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Đã xảy ra lỗi khi gửi đánh giá.'], 500);
        }
    }
    public function submitZone(RatingZoneRequest $request)
    {
        $validated = $request->validated();

        // Kiểm tra xem room_slug có được truyền đúng không
        if (!$request->has('zone_slug')) {
            return response()->json(['success' => false, 'message' => 'Khu trọ không hợp lệ.'], 400);
        }

        $validated['zone_slug'] = $request->input('zone_slug');

        $review = $this->CommentClientService->submitZone($validated);

        if ($review) {
            return response()->json(['success' => true, 'message' => 'Đánh giá của bạn đã được gửi thành công!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Đã xảy ra lỗi khi gửi đánh giá.'], 500);
        }
    }


    // public function submitBlogs(CommentBlogRequest $request)
    // {
    //     $validated = $request->validated();

    //     if (!$request->has('blog_slug')) {
    //         return response()->json(['success' => false, 'message' => 'Phòng không hợp lệ.'], 400);
    //     }

    //     $validated['blog_slug'] = $request->input('blog_slug');
    //     $blog = $this->CommentClientService->submitBlogs($validated);

    //     if ($blog) {
    //         return response()->json(['success' => true, 'message' => 'Bình luận của bạn đã được gửi thành công!']);
    //     } else {
    //         return response()->json(['success' => false, 'message' => 'Đã xảy ra lỗi khi gửi bình luận.'], 500);
    //     }
    // }
    public function submitBlogs(CommentBlogRequest $request)
    {
        $validated = $request->validated();

        if (!$request->has('blog_slug')) {
            return response()->json(['success' => false, 'message' => 'Blog không hợp lệ.'], 400);
        }

        $validated['blog_slug'] = $request->input('blog_slug');

        // Kiểm tra xem người dùng đã bình luận chưa
        $existingComment = $this->CommentClientService->checkExistingBlogComment(Auth::id(), $validated['blog_slug']);
        if ($existingComment) {
            return response()->json(['success' => false, 'message' => 'Bạn đã bình luận rồi. Vui lòng xóa bình luận cũ trước.'], 400);
        }

        // Nếu chưa có bình luận, thì mới tạo bình luận mới
        $blog = $this->CommentClientService->submitBlogs($validated);

        if ($blog) {
            return response()->json(['success' => true, 'message' => 'Bình luận của bạn đã được gửi thành công!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Đã xảy ra lỗi khi gửi bình luận.'], 500);
        }
    }
    public function submitUsers(UserRequest $request)
    {
        $validated = $request->validated();

        if (!$request->has('user_slug')) {
            return response()->json(['success' => false, 'message' => 'Phòng không hợp lệ.'], 400);
        }

        $validated['user_slug'] = $request->input('user_slug');
        $user = $this->CommentClientService->submitUsers($validated);

        if ($user) {
            return response()->json(['success' => true, 'message' => 'Bình luận của bạn đã được gửi thành công!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Đã xảy ra lỗi khi gửi bình luận.'], 500);
        }
    }
}
