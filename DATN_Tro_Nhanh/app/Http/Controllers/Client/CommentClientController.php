<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Services\CommentClientService;

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


}

