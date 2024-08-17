<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserCreateRequest;

class UserController extends Controller
{
    public function kepalalab()
    {
        // Ambil hanya pengguna dengan peran 'Koordinator Lab'
        $labCoordinatorRole = Role::where('name', 'Lab Coordinator')->first();
        $user = User::where('roles_id', $labCoordinatorRole->id)->with('roles')->get();
        return view('kepala-lab.koor-lab.koor-lab', ['userList' => $user]);
    }

    public function koorlab()
    {
        // Ambil hanya pengguna dengan peran 'Pengunjung Lab'
        $users = User::where('roles_id', 3)->with('roles')->get();
        return view('koordinator-lab.daftar-pengunjung.daftar-pengunjung', ['users' => $users]);
    }

    public function create()
    {
        // Ambil hanya peran 'Koordinator Lab'
        $role = Role::select('id', 'name')->where('name', 'Lab Coordinator')->get();
        return view('kepala-lab.koor-lab.koor-lab-add', ['roles' => $role]);
    }

    public function store(UserCreateRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->roles_id = $request->roles_id;
        $user->save();

        // flesh message
        if($user) {
            Session::flash('status', 'Berhasil');
            Session::flash('message', 'Tambah Data Koor Lab Berhasil!');
        }

        return redirect('/kepala-lab/koor-lab');
    }

    public function edit(Request $request, $id)
    {
        $user = User::with('roles')->findOrfail($id);
        // Ambil hanya peran 'Koordinator Lab'
        $role = Role::select('id', 'name')->where('name', 'Lab Coordinator')->get();
        return view('kepala-lab.koor-lab.koor-lab-edit', ['user' => $user, 'role' => $role]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrfail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->roles_id = $request->roles_id;
        $user->save();

        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Ubah Data Koor Lab Berhasil!');

        return redirect('/kepala-lab/koor-lab');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Hapus Data Koor Lab Berhasil!');
    
        return redirect('/kepala-lab/koor-lab');
    }
}
