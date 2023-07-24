<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\UserLoginLog;
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard.index'
        ]);
    }

    public function index(){
        return view('auth.login_form');
    }

    public function authenticate(Request $request, UserLoginLog $userLoginLog){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            $data = [
                'user_id' => Auth::user()->id,
                'ip_address' => $request->ip()
            ];
            $userLoginLog->create($data);
            return redirect()->route('dashboard.index');
        }

        Alert::error('Error', 'Email atau Password salah! Silahkan coba lagi.');
        return back()->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }

}
