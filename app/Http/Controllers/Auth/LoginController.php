<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    protected $redirectTo = '/db-dashboard';

    public function __construct()
    {
        $this->middleware('guest')->only('pintuGerbang');
    }

    public function gerbang()
    {
        // dd(session()->all());
        return view('profile.access');
    }

    public function masukGerbang(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            $intendedUrl = session()->get('url.intended', $this->redirectTo);
            return redirect()->intended($intendedUrl);
        }

        return redirect()->route('pintuGerbang')
                         ->with('error', 'Invalid credentials.')
                         ->withInput($request->only('email'));
    }

    public function keluarGerbang(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flush();
        return redirect()->route('pintuGerbang');
    }
}
