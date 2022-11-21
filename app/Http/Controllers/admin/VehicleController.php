<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Plate;
use App\Models\Vehicle;
use Exception;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        return view('admin.vehicles', [
            'vehicles' => Vehicle::all()
        ]);
    }

    public function respond(Request $request)
    {
        $request->validate([
            'vehicle_id' => ['required', 'numeric'],
            'status' => ['required', 'integer']
        ]);

        try{
            $vehicle = Vehicle::find($request->vehicle_id);
            if(is_null($vehicle)){
                return redirect()->back()->with('error', 'We could not locate the vehicle');
            }

            if($request->status === 0 || $request->status === 2){
                return redirect()->back()->with('error', 'Cannot locate senge');
            }else{
                $plate = new Plate();
                $plate->vehicle_id =$vehicle->id;
                $plate->number;
                $plate->save();

                $vehicle->status = $request->status;
                $vehicle->save();

                return redirect()->back()->with('success', 'succesfull added status');
            }
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERRoR: '.$e->getMessage());
        }
    }
}
