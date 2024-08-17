<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabCreateRequest;
use App\Models\Lab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LabController extends Controller
{
    public function index()
    {
        $lab = Lab::with('activities')->get();
        return view('kepala-lab.jenis-lab.jenis-lab', ['labList' => $lab]);
    }

    public function create()
    {
        return view('kepala-lab.jenis-lab.jenis-lab-add');
    }

    public function store(LabCreateRequest $request)
    {
        $lab = new Lab();
        $lab->lab_name = $request->lab_name;
        $lab->description = $request->description;
        $lab->save();

        // flesh message
        if($lab) {
            Session::flash('status', 'Berhasil');
            Session::flash('message', 'Tambah Data Jenis Lab Berhasil!');
        }

        return redirect('/kepala-lab/jenis-lab');
    }

    public function edit(Request $request, $id)
    {
        $lab = Lab::findOrfail($id);
        return view('kepala-lab.jenis-lab.jenis-lab-edit', ['lab' => $lab]);
    }

    public function update(Request $request, $id)
    {
        $lab = Lab::findOrFail($id);
        $lab->lab_name = $request->lab_name;
        $lab->description = $request->description;
        $lab->save();

        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Ubah Data Jenis Lab Berhasil!');

        return redirect('/kepala-lab/jenis-lab');
    }

    public function destroy($id)
    {
        $lab = Lab::findOrFail($id);
        $lab->delete();

        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Hapus Data Jenis Lab Berhasil!');
    
        return redirect('/kepala-lab/jenis-lab');
    }
}
