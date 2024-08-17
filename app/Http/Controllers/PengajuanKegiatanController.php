<?php

namespace App\Http\Controllers;

use App\Models\ActivitySubmission;
use App\Models\Doc;
use Illuminate\Http\Request;

class PengajuanKegiatanController extends Controller
{
    public function showUploadForm($id)
    {
        $pengajuan = ActivitySubmission::findOrFail($id);
        return view('koordinator-lab.upload-dokumen', compact('pengajuan'));
    }

    public function uploadDokumen(Request $request, $id)
    {
        $request->validate([
            'documents_id' => 'required|exists:documents,id',
            'description' => 'nullable|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $pengajuan = ActivitySubmission::findOrFail($id);
        $path = $request->file('file')->store('docs');

        Doc::create([
            'users_id' => auth()->id(),  // Koordinator
            'visitors_id' => $pengajuan->users_id,  // Lab Visitor
            'activities_id' => $pengajuan->activities_id,
            'documents_id' => $request->documents_id,
            'description' => $request->description,
            'file_path' => $path,
        ]);

        return redirect('/koordinator-lab/pengajuan-kegiatan/');
    }
}
