<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ZoneServices;
use App\Http\Requests\ZoneRequest;
use Illuminate\Container\Attributes\Auth;
use App\Events\ZoneCreated; // Import event
class ZoneOwnersController extends Controller
{
    //
    public function __construct(ZoneServices $zoneServices)
    {
        $this->zoneServices = $zoneServices;
    }
    public function index()
    {

        return view('owners.create.add-new-zone');
    }
    public function store(ZoneRequest  $request)
    {

        if ($request->isMethod('post')) {
            $zone = $this->zoneServices->store($request);

            if ($zone) {
                // Phát sự kiện ZoneCreated và truyền đối tượng Zone mới tạo
                event(new ZoneCreated($zone));

                return redirect()->route('owners.zone-start-post')->with('success', 'Zone đã được tạo thành công.');
            }
        }


        return view('owners.create.add-new-zone');
    }
}
