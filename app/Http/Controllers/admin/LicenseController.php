<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\License;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    public function index()
    {
        return view('admin.licenses', [
            'licenses' => License::all()
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'license_number' => ['required'],
            'natid' => ['required']
        ]);

        $old = License::where('natid', $request->natid)->first();
        if(is_null($old)){
            $lic = new License();
            $lic->number = $request->license_number;
            $lic->natid = $request->natid;
            $lic->save();

            return redirect()->back()->with('success', 'successfully added a license');
        }

        return redirect()->back()->with('error', 'cannot duplicate location');
    }
}
