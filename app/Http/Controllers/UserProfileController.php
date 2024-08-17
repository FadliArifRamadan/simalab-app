<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserProfileController extends Controller
{
    public function index()
    {
        // Mengambil data user yang sedang login
        $user = Auth::user();
        return view('pengunjung-lab.profile.profile', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $user = User::findOrfail($id);

        // Validasi data yang diupdate
        $request->validate([
            'name' => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'identities' => 'required|int',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update data user
        $user->name = $request->input('name');
        $user->business_name = $request->input('business_name');
        $user->identities = $request->input('identities');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Update Data Profile Berhasil!');

        return redirect('/pengunjung-lab/profile');
    }

    public function indexKoorlab()
    {
        // Mengambil data user yang sedang login
        $user = Auth::user();
        return view('koordinator-lab.profile.profile', ['user' => $user]);
    }

    public function updateKoorlab(Request $request, $id)
    {
        $user = Auth::user();

        $user = User::findOrfail($id);

        // Validasi data yang diupdate
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update data user
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Ubah Data Profile Berhasil!');

        return redirect('/koordinator-lab/profile');
    }

    public function indexKalab()
    {
        // Mengambil data user yang sedang login
        $user = Auth::user();
        return view('kepala-lab.profile.profile', ['user' => $user]);
    }

    public function updateKalab(Request $request, $id)
    {
        $user = Auth::user();

        $user = User::findOrfail($id);

        // Validasi data yang diupdate
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update data user
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Ubah Data Profile Berhasil!');

        return redirect('/kepala-lab/profile');
    }
}
