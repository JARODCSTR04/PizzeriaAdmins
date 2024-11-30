<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminsController extends Controller
{
    public function login(Request $request) {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];
        $remember = ($request->has('remember')?true:false);

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('productos.index');
        } else {
            return redirect('/');
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Sesión cerrada correctamente.');
    }
}
