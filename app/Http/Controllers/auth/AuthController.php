<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    public function authenticate(Request $request) {
        $request->validate(array(
            'username' => 'required|max:255',
            'password' => 'required'
        ));
        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(["success" => true]);
        }
        return response()->json(["success" => false]);
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

}
