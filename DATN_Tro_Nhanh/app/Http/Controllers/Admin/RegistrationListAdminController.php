<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RegistrationAdminService;
use App\Services\ImageAdminService;
class RegistrationListAdminController extends Controller
{
    //
    protected $RegistrationAdminService;

    public function __construct(RegistrationAdminService $registrationAdminService,ImageAdminService $imageAdminService)
    {
        $this->registrationAdminService = $registrationAdminService;
        $this->imageAdminService = $imageAdminService;
    }
    public function index(){

        $list=$this->registrationAdminService->getAll();
        return view('admincp.show.list-register',compact('list'));
    }
    public function show($id){

        $single_detail=$this->registrationAdminService->getID($id);
        $list_image=$this->imageAdminService->getImageUserId($single_detail->id);
        // dd($list_image);
        return view('admincp.show.detail-register',compact('single_detail','list_image'));

    }
}
