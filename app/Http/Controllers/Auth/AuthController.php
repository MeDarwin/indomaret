<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function __construct()
    {
        $this->middleware('guest')->only('index');
    }
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $validated = request()->validate(['username' => 'required', 'password' => 'required']);
        $isLoggedIn = Auth::attempt($validated);
        if ($isLoggedIn)
            $request->session()->regenerate();
        return $isLoggedIn
            ? redirect(RouteServiceProvider::HOME)
            : redirect('login')->with('Failed', 'Login Failed');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}