<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryAdminController extends Controller
{
    public function index(){}
    
    public function create(){
        return view('admincp.create.addCategory');
    }
    
    public function update(){
        return view('admincp.edit.updateCategory');
}
}