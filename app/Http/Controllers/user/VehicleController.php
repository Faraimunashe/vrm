<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class VehicleController extends Controller
{
    public function index()
    {
        return view('user.vehicles', [
            'vehicles' => Vehicle::where('user_id', Auth::id())->get()
        ]);
    }

    public function download($vehicle_id)
    {
        $data = Vehicle::join('plates', 'plates.vehicle_id', '=', 'vehicles.id')->where('vehicles.id',$vehicle_id)->first();
        if(is_null($data)){
            return redirect()->back()->with('error', 'cannot locate vehicle data');
        }

        $pdf = PDF::loadView('pdf.plate', ["data"=>$data]);

        return $pdf->download($data->name.'-plate.pdf');
    }
}
