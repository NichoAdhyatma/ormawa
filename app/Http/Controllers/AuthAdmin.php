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
}
