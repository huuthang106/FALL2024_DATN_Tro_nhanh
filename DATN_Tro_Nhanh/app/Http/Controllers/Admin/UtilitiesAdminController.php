<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUtilityRequest;
use App\Http\Requests\UpdateUtilityRequest;
use App\Services\UtilitiesService;
use Illuminate\Http\Request;

class UtilitiesAdminController extends Controller
{
    protected $utilitiesService;

    public function __construct(UtilitiesService $utilitiesService)
    {
        $this->utilitiesService = $utilitiesService;
    }

    public function listUtilities()
    {
        $utilities = $this->utilitiesService->getAllUtilities();
        return view('admincp.show.utilities', compact('utilities')); // Assuming this is your view
    }


}
