<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ChatOwnersController extends Controller
{
    //
    public function index(){
        // $contacts = Contact::where('user_id', Auth::id())->orWhere('contact_user_id', Auth::id())->get();
        return view('owners.chat.view-chat');
    }
    public function add_contact($contactUserId)
    {
        // Kiểm tra xem liên hệ đã tồn tại chưa
        $existingContact = Contact::where('user_id', Auth::id())
                                  ->where('contact_user_id', $contactUserId)
                                  ->first();
    
        if (!$existingContact) {
            // Nếu chưa tồn tại, tạo một bản ghi mới trong bảng contact
            Contact::create([
                'user_id' => Auth::id(), // ID của người dùng hiện tại
                'contact_user_id' => $contactUserId // ID của người dùng được thêm vào danh bạ
            ]);
        }
        
        // Chuyển hướng đến trang chat, bất kể đã thêm mới hay không
        return redirect()->route('owners.chat-owners');
    }
}
