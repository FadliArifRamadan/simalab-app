<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentCreateRequest;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DocumentController extends Controller
{
    public function index()
    {
        $document = Document::with('docs')->get();
        return view('kepala-lab.jenis-dokumen-lab.jenis-dokumen-lab', ['documentList' => $document]);
    }

    public function create()
    {
        return view('kepala-lab.jenis-dokumen-lab.jenis-dokumen-lab-add');
    }

    public function store(DocumentCreateRequest $request)
    {
        $document = new Document();
        $document->name = $request->name;
        $document->description = $request->description;
        $document->save();

        // flesh message
        if($document) {
            Session::flash('status', 'Berhasil');
            Session::flash('message', 'Tambah Data Jenis Dokumen Lab Berhasil!');
        }

        return redirect('/kepala-lab/jenis-dokumen-lab');
    }

    public function edit(Request $request, $id)
    {
        $document = Document::findOrfail($id);
        return view('kepala-lab.jenis-dokumen-lab.jenis-dokumen-lab-edit', ['document' => $document]);
    }

    public function update(Request $request, $id)
    {
        $document = Document::findOrFail($id);
        $document->name = $request->name;
        $document->description = $request->description;
        $document->save();

        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Ubah Data Jenis Dokumen Lab Berhasil!');

        return redirect('/kepala-lab/jenis-dokumen-lab');
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();

        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Hapus Data Jenis Dokumen Lab Berhasil!');
    
        return redirect('/kepala-lab/jenis-dokumen-lab');
    }
}
