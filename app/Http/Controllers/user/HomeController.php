<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    public function apply(Request $request)
    {
        $request->validate([
            'make' => ['required'],
            'model' => ['required'],
            'manufactured_at' => ['required', 'date'],
            'color' => ['required'],
            'engine_num' => ['required'],
            'engine_num' => ['required']
        ]);

        try{
            $v = new Vehicle();
            $v->user_id = Auth::id();
            $v->make = $request->make;
            $v->model = $request->model;
            $v->manufactured_at = $request->manufactured_at;
            $v->color = $request->color;
            $v->engine_number = $request->engine_num;
            $v->chasis_number = $request->chasis_num;
            $v->status = 2;
            $v->save();

            return redirect()->back()->with('success', 'application submitted successfully');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', 'ERROR: '.$e->getMessage());
        }
    }
}
