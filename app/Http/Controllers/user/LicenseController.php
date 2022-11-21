<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\License;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    public function index(Request $request)
    {
        $licenses = [];
        if(isset($request->search))
        {
            $licenses = License::where('number', $request->search)->orWhere('natid', $request->search)->get();
            return view('user.licenses', [
                'licenses' => $licenses
            ]);
        }
        return view('user.licenses', [
            'licenses' => $licenses
        ]);
    }
}
