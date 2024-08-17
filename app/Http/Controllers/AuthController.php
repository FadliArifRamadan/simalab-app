<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // login pengunjung
    public function loginpengunjung()
    {
        return view('auth.login.login-pengunjung-lab');
    }

    public function authenticatepengunjung(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/pengunjung-lab/dashboard');
        }

        Session::flash('status', 'gagal');
        Session::flash('message', 'akun tidak ditemukan!');

        return redirect('/');
    }

    // register pengunjung
    public function registerpengunjung()
    {
        // Ambil hanya peran 'pengunjung Lab'
        $role = Role::select('id', 'name')->where('name', 'Lab Visitor')->get();
        return view('auth.register.register-pengunjung', ['roles' => $role]);
    }

    public function storeregisterpengunjung(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->business_name = $request->business_name;
        $user->email = $request->email;
        $user->roles_id = $request->roles_id;
        $user->identities = $request->identities;
        $user->password = Hash::make($request->password);
        $user->save();

        // flesh message
        if($user) {
            Session::flash('status', 'Berhasil');
            Session::flash('message', 'Tambah Akun Pengunjung Lab Berhasil!');
        }

        return redirect('/register/register-pengunjung');
    }

    public function logoutpengunjung(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Kepala Lab
    public function loginkalab()
    {
        return view('auth.login.login-kepala-lab');
    }

    public function authenticatekalab(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/kepala-lab/dashboard');
        }

        Session::flash('status', 'gagal');
        Session::flash('message', 'akun tidak ditemukan!');

        return redirect('/kepala-lab/login');
    }

    public function logoutkalab(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/kepala-lab/login');
    }

    // Koor Lab
    public function loginkoorlab()
    {
        return view('auth.login.login-koor-lab');
    }

    public function authenticatekoorlab(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/koordinator-lab/dashboard');
        }

        Session::flash('status', 'gagal');
        Session::flash('message', 'akun tidak ditemukan!');

        return redirect('/koor-lab/login');
    }

    public function logoutkoorlab(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/koor-lab/login');
    }
}
