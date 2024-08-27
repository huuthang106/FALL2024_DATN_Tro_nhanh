<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\RegistrationList;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Log;

class RegistrationAdminService
{
    public function getAll()
    {
        $registrations = RegistrationList::orderByDesc('created_at')->where('status',1)->paginate(10);
        return $registrations;
    } public function getID($id)
    {
        $user = RegistrationList::where('id',$id)->first();
        return $user;
    }
}