<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ChatOwnersController extends Controller
{
    //
    public function index()
    {
        // $contacts = Contact::where('user_id', Auth::id())->orWhere('contact_user_id', Auth::id())->get();
        return view('owners.chat.view-chat');
    }
    // public function add_contact($contactUserId)
    // {
    //     // Kiểm tra xem liên hệ đã tồn tại chưa
    //     $existingContact = Contact::where('user_id', Auth::id())
    //         ->where('contact_user_id', $contactUserId)
    //         ->first();

    //     if (!$existingContact) {
    //         // Nếu chưa tồn tại, tạo một bản ghi mới trong bảng contact
    //         Contact::create([
    //             'user_id' => Auth::id(), // ID của người dùng hiện tại
    //             'contact_user_id' => $contactUserId // ID của người dùng được thêm vào danh bạ
    //         ]);
    //     }

    //     // Chuyển hướng đến trang chat, bất kể đã thêm mới hay không
    //     return redirect()->route('owners.chat-owners');
    // }

    // Mã hóa Encrypt/Decrypt
    // public function add_contact($contactUserId)
    // {
    //     $existingContact = Contact::where(function ($query) use ($contactUserId) {
    //         $query->where('user_id', Auth::id())
    //             ->where('contact_user_id', $contactUserId);
    //     })->orWhere(function ($query) use ($contactUserId) {
    //         $query->where('user_id', $contactUserId)
    //             ->where('contact_user_id', Auth::id());
    //     })->first();

    //     if (!$existingContact) {
    //         $existingContact = Contact::create([
    //             'user_id' => Auth::id(),
    //             'contact_user_id' => $contactUserId,
    //         ]);
    //     }

    //     // Mã hóa contact_id
    //     $encryptedContactId = encrypt($existingContact->id);

    //     // Chuyển hướng với contact_id đã được mã hóa
    //     return redirect()->route('owners.chat-owners', ['contact' => $encryptedContactId]);
    // }

    // Mã hóa seesion
    public function add_contact($contactUserId)
    {
        $existingContact = Contact::where(function ($query) use ($contactUserId) {
            $query->where('user_id', Auth::id())
                ->where('contact_user_id', $contactUserId);
        })->orWhere(function ($query) use ($contactUserId) {
            $query->where('user_id', $contactUserId)
                ->where('contact_user_id', Auth::id());
        })->first();

        if (!$existingContact) {
            $existingContact = Contact::create([
                'user_id' => Auth::id(),
                'contact_user_id' => $contactUserId,
            ]);
        }

        // Lưu contact_id vào session
        session(['contact_id' => $existingContact->id]);

        return redirect()->route('owners.chat-owners');
    }
}
