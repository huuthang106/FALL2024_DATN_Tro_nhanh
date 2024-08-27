<?php

namespace App\Services;

use App\Models\Favourite;
use App\Models\Image;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ImageAdminService
{
  public function getImageUserId($id){
    $list_image = Image::where('registrationlist_id', $id)->get();
    return $list_image;
  }
   

}

   
