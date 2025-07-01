<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    //menghandle login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        //proses login
        if(Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ], $request->filled('remember'))) {
            $user = Auth::user();
            
            $request->session()->put([
            'user_id' => $user->id,
            'username' => $user->username,
            'role' => $user->role,
            'status' => $user->status,
        ]);

            if($user->role == 'admin'){
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'mahasiswa'){
                return redirect()->route('prediksi');
            }
        }
        return back()->withErrors(['login_error' => 'Username atau password salah!.']);
    }

    public function adminDashboard()
    {
        return view();
    }

    public function mahasiswaProfile()
    {
        return view();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}