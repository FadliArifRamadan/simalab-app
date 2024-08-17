<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrintedDocument;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PrintedDocumentController extends Controller
{
    public function index()
    {
        $printedDocument = PrintedDocument::with('visitors', 'coordinators', 'heads')->get();

        $visitors = User::where('roles_id', 3)->get();
        $coordinators = User::where('roles_id', 2)->get();
        $heads = User::where('roles_id', 1)->get();

        return view('koordinator-lab.dokumen-cetak.dokumen-cetak', [
            'printedDocument' => $printedDocument,
            'visitors' => $visitors,
            'coordinators' => $coordinators,
            'heads'  => $heads
        ]);
    }

    public function create()
    {
        $visitors = User::where('roles_id', 3)->get();
        $coordinators = User::where('roles_id', 2)->get();
        $heads = User::where('roles_id', 1)->get();

        return view('koordinator-lab.dokumen-cetak.dokumen-cetak-add', [
            'visitors' => $visitors,
            'coordinators' => $coordinators,
            'heads'  => $heads
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'date' => 'required|date',
            'activity' => 'required|string',
            'visitors_id' => 'required|exists:users,id',
            'business_name' => 'required|string',
            'from' => 'required|string',
            'no_phone' => 'required|string',
            'coordinators_id' => 'required|exists:users,id',
            'heads_id' => 'required|exists:users,id',
        ]);

        $visitor = User::find($request->visitors_id);
        $coordinator = User::find($request->coordinators_id);
        $head = User::find($request->heads_id);

        $qrContent = $visitor->name . ', ' . $coordinator->name . ', ' . $head->name;
        // $qrCode = QrCode::format('png')->size(200)->generate($qrContent);
        $qrCodePath = 'qr_codes/' . uniqid() . '.png';
        // Storage::disk('public')->put($qrCodePath, $qrCode);

        $printedDocument = PrintedDocument::create([
            'date' => $request->date,
            'activity' => $request->activity,
            'visitors_id' => $request->visitors_id,
            'business_name' => $request->business_name,
            'from' => $request->from,
            'no_phone' => $request->no_phone,
            'coordinators_id' => $request->coordinators_id,
            'heads_id' => $request->heads_id,
            'qr_code' => $qrCodePath,
        ]);

        // flesh message
        if($printedDocument) {
            Session::flash('status', 'Berhasil');
            Session::flash('message', 'Tambah Data Dokumen Cetak Berhasil!');
        }

        return redirect('/koordinator-lab/dokumen-cetak');
    }

    public function edit(Request $request, $id)
    {
        $printedDocument = PrintedDocument::findOrFail($id);
        return view('koordinator-lab.dokumen-cetak.dokumen-cetak-edit', ['printedDocument' => $printedDocument]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'date' => 'required',
            'activity' => 'required|max:60',
            'businessmen_name' => 'required|max:60',
            'business_name' => 'required|max:60',
            'from' => 'required',
            'no_phone' => 'required|max:20',
            'discussion' => 'required|max:60',
            'lab_coordinator_name' => 'required|max:60',
            'lab_head_name' => 'required|max:60',
        ]);

        $printedDocument = PrintedDocument::findOrFail($id);
        $printedDocument->date = $request->date;
        $printedDocument->activity = $request->activity;
        $printedDocument->businessmen_name = $request->businessmen_name;
        $printedDocument->business_name = $request->business_name;
        $printedDocument->from = $request->from;
        $printedDocument->no_phone = $request->no_phone;
        $printedDocument->discussion = $request->discussion;
        $printedDocument->lab_coordinator_name = $request->lab_coordinator_name;
        $printedDocument->lab_head_name = $request->lab_head_name;
        $printedDocument->save();

        // flesh message
        if($printedDocument) {
            Session::flash('status', 'Berhasil');
            Session::flash('message', 'Ubah Data Dokumen Cetak Berhasil!');
        }

        return redirect('/koordinator-lab/dokumen-cetak');
    }

    public function destroy($id)
    {
        $printedDocument = PrintedDocument::findOrFail($id);
        $printedDocument->delete();

        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Hapus Data Dokumen Cetak Berhasil!');
    
        return redirect('/koordinator-lab/dokumen-cetak');
    }


    public function cetak()
    {
        return view('koordinator-lab.dokumen-cetak.cetak');
    }
}
