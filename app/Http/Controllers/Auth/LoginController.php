<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Lang;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view("auth.login");
    }

    public function throttlekey(Request $request){
        return Str::lower($request->input('email')).'|'.$request->ip();
    }
    public function login(Request $request)
    {
        $request->validate([
            
        ])
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['email' => 'Correo o contraseña incorrectos.'])->onlyInput('email');
    }
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }


}