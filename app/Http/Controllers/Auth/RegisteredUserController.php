<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            //'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'fname' => ['required', 'string'],
            'lname' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'phone' => ['required', 'digits:10'],

        ]);

        $user = User::create([
            'name' => $request->lname.' '.substr($request->fname, 0, 1),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->attachRole('user');

        event(new Registered($user));

        $d = new Detail();
        $d->user_id = $user->id;
        $d->fname = $request->fname;
        $d->lname = $request->lname;
        $d->sex = $request->gender;
        $d->mobile = $request->phone;
        $d->natid = $request->natid;

        $d->save();

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
