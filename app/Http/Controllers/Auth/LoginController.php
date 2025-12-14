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
            'email' => ['required', 'email'],
            'password' => ['required'],
            'remember' => ['sometimes', 'boolean'],
        ]);

        $key = $this->throttlekey($request);

        if (RateLimiter::tooManyAttempts($key, 5)){
            $seconds = RateLimiter::availableIn($key);
            throw ValidationException::withMessages([
                'email' => [Lang::get('auth.throttle', ['seconds' => $seconds])],
            ])->status(429);
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            RateLimiter::clear($key);
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        RateLimiter::hit($key, 60);

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}