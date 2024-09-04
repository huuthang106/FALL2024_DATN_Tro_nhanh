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
}
