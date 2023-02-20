<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller {

    public function index() {
        return view("auth.register");
    }

    public function store(Request $request) {
        $this->validate($request, array(
           'username' => 'required|unique:users|max:255',
            'password' => 'required|confirmed'
        ));

        if(env('DISABLE_REGISTRATIONS', false)) {
            return back()->with('error', 'Registrations are currently disabled');
        }

        User::create(array(
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ));


        return redirect()->route('login')->with('registration', 'You are successfully registered. Please log in now!');

    }

}
