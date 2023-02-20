<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {


    public function index() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $request->validate(array(
            'username' => 'required|max:255',
            'password' => 'required'
        ));

        $remember = $request->has("remember");
        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->route('index');
        }

        return back()->with('status', 'The provided credentials do not match our records.');
    }

    public function username() {
        return 'username';
    }

}
