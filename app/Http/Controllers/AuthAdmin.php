<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthAdmin extends Controller
{
    public function index()
    {
        return Inertia::render('Auth/LoginAdmin');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->remember;

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            // Authentication passed...
            return redirect('/admin');
        } else {
            return "WikWok Data Salah";
        }
    }

    /**
 * Log the user out of the application.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
