<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityCreateRequest;
use App\Models\Activity;
use App\Models\Lab;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ActivityController extends Controller
{
    public function index()
    {
        $activity = Activity::with('coordinators')->get();

        $coordinators = User::where('roles_id', 2)->get(); // Lab Coordinators

        return view('kepala-lab.jenis-kegiatan.jenis-kegiatan-lab', [
            'activityList' => $activity,
            'coordinators' => $coordinators
        ]);
    }

    public function create()
    {
        // Mengambil data dari relasi dengan tabel users 
        $coordinators = User::where('roles_id', 2)->select('id', 'name')->get();

        return view('kepala-lab.jenis-kegiatan.jenis-kegiatan-lab-add', ['coordinators' => $coordinators]);
    }

    public function store(ActivityCreateRequest $request)
    {
        $activity = new Activity();
        $activity->activity_type = $request->activity_type;
        $activity->coordinators_id = $request->coordinators_id;
        $activity->description = $request->description;
        $activity->save();

        // flesh message
        if($activity) {
            Session::flash('status', 'Berhasil');
            Session::flash('message', 'Tambah Data Jenis Kegiatan Lab Berhasil!');
        }

        return redirect('/kepala-lab/jenis-kegiatan-lab');
    }

    public function edit(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);
        return view('kepala-lab.jenis-kegiatan.jenis-kegiatan-lab-edit', ['activity' => $activity]);
    }

    public function update(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->activity_type = $request->activity_type;
        $activity->coordinators_id = $request->coordinators_id;
        $activity->description = $request->description;
        $activity->save();

        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Ubah Data Jenis Kegiatan Lab Berhasil!');

        return redirect('/kepala-lab/jenis-kegiatan-lab');
    }

    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Hapus Data Jenis Kegiatan Lab Berhasil!');
    
        return redirect('/kepala-lab/jenis-kegiatan-lab');
    }
}
