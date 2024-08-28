<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
 class UserAdminServices{
    public function updateRole($id, $role){
        $user = User::find($id);
        if($user){
            $user->role = $role;
            $user->save();
            return true;
        }
        return false;
    }
 }