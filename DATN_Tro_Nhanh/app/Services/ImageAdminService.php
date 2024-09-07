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
  public function getImageUserId($id)
  {
    if (auth::check()) {
      $list_image = Image::where('identity_id', $id)->get();
      return $list_image;
    }
    return null;
  }
}
