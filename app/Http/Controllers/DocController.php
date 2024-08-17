<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use App\Models\User;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DocCreateRequest;
use App\Models\Activity;
use App\Models\ActivitySubmission;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DocController extends Controller
{
    public function koorlab(Request $request)
    {
        // Mengambil user yang login saat ini
        $user = Auth::user();

        // Memeriksa apakah pengguna memiliki peran Lab Coordinator (roles_id = 2)
        if ($user->roles_id == 2) {
            $docQuery = Doc::with('documents', 'coordinators', 'visitors', 'activities')
            ->where('users_id', $user->id);
        }

        $doc = $docQuery->get();

        $coordinators = User::where('roles_id', 2)->get(); // Hanya mengambil user dengan roles_id = 2 (Lab Coordinator)
        $documents = Document::all(); // Semua Document
        $visitors = User::where('roles_id', 3)->get(); // Hanya mengambil user dengan roles_id = 3 (Lab Visitor)
        $activities = Activity::all(); // Semua Activity

        return view('koordinator-lab.dokumen-lab.dokumen-lab', [
            'docList' => $doc,
            'coordinators$coordinators' => $coordinators,
            'documents' => $documents,
            'visitors' => $visitors,
            'activities' => $activities
        ]);
    }

    public function kepalalab(Request $request)
    {
        $selectedUserId = $request->query('users_id');

        $docQuery = Doc::with('documents', 'coordinators', 'visitors', 'activities');
        if ($selectedUserId) {
            $docQuery->where('users_id', $selectedUserId);
        }
        $doc = $docQuery->get();

        $coordinators = User::where('roles_id', 2)->get(); // Hanya mengambil user dengan roles_id = 2 (Lab Coordinator)

        return view('kepala-lab.dokumen-lab.dokumen-lab', [
            'docList' => $doc,
            'coordinators' => $coordinators,
            'selectedUserId' => $selectedUserId,
        ]);
    }

    public function pengunjung()
    {
        // Mengambil user yang sedang login
        $user = Auth::user();

        // Memeriksa apakah user memiliki role 'lab visitor' (roles_id = 3)
        if ($user->roles_id == 3) {
            $docs = Doc::with('documents', 'coordinators', 'visitors', 'activities')
                ->where('visitors_id', $user->id)
                ->get();

            return view('pengunjung-lab.dokumen.dokumen-lab', [
                'docList' => $docs,
            ]);
        } else {
            return redirect('/pengunjung-lab/dashboard')->with('error', 'Anda tidak memiliki akses untuk halaman ini.');
        }
    }

    public function downloadPengunjung($id)
    {
        $doc = Doc::findOrFail($id);

        if ($doc->file_path) {
            $filePath = storage_path('app/' . $doc->file_path);
            Log::info("Downloading file from path: " . $filePath);

            if (Storage::exists($doc->file_path)) {
                return Storage::download($doc->file_path);
            } else {
                return redirect()->back()->with('error', 'File tidak ditemukan.');
            }
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }

    public function downloadKalab($id)
    {
        $doc = Doc::findOrFail($id);

        if ($doc->file_path) {
            $filePath = storage_path('app/' . $doc->file_path);
            Log::info("Downloading file from path: " . $filePath);

            if (Storage::exists($doc->file_path)) {
                return Storage::download($doc->file_path);
            } else {
                return redirect()->back()->with('error', 'File tidak ditemukan.');
            }
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }

    public function create(Request $request)
    {   
        
        // ambil pilihan pengajuan
        $submission_id = $request->submission_id;

        
        // ambil data submission id
        $activitySubmissionQuery = ActivitySubmission::with('visitors','activities')
        ->where('id', $submission_id)->get()[0]; 
        
        // dd($activitySubmissionQuery);

        // Mengambil user yang login saat ini
        $coordinators = Auth::user();

        // Mengambil data dari relasi dengan tabel users, labs, dan activities
        $documents = Document::all();
        $visitors = User::where('roles_id', 3)->select('id', 'name')->get();
        $activities = Activity::where('coordinators_id', $coordinators->id)->select('id', 'activity_type')->get(); // Menampilkan kegiatan yang sesuai dengan koordinator lab yang sedang login

        return view('koordinator-lab.dokumen-lab.dokumen-lab-add', [
            'documents' => $documents, 
            'coordinators' => $coordinators, // Pass the user object, not a collection
            'visitors' => $visitors,
            'activities' => $activities,
            'records' => $activitySubmissionQuery // data yang di pilih untuk upload dokumen
        ]);
    }

    // public function createDoc($submission_id)
    // {
    //     // Mengambil user yang login saat ini
    //     $coordinators = Auth::user();

    //     // Mengambil data dari tabel activity_submissions
    //     $submission = ActivitySubmission::with('visitors', 'activities')
    //         ->where('id', $submission_id)
    //         ->firstOrFail();

    //     // Mengambil data dari relasi dengan tabel users, labs, dan activities
    //     $documents = Document::all();
    //     $visitors = User::where('roles_id', 3)->select('id', 'name')->get();
    //     $activities = Activity::where('coordinators_id', $coordinators->id)->select('id', 'activity_type')->get();

    //     return view('koordinator-lab.dokumen-lab.dokumen-lab-add', [
    //         'documents' => $documents,
    //         'coordinators' => $coordinators,
    //         'visitors' => $visitors,
    //         'activities' => $activities,
    //         'submission' => $submission
    //     ]);
    // }

    // public function store(DocCreateRequest $request)
    // {
    //     // Validasi input dari form
    //     $request->validate([
    //         'users_id' => 'required',
    //         'visitors_id' => 'required',
    //         'activities_id' => 'required',
    //         'documents_id' => 'required',
    //         'description' => 'required',
    //         'file_path' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png',
    //     ]);

    //     // Looping untuk menyimpan setiap dokumen yang diinputkan
    //     foreach ($request->users_id as $index => $userId) {
    //         // Meng-handle upload file jika ada
    //         $file_path = isset($request->file_path[$index]) ? $request->file('file_path')[$index]->storeAs('docs', $request->file('file_path')[$index]->getClientOriginalName()) : null;

    //         // Membuat objek Dokumen baru menggunakan model Doc
    //         $doc = new Doc();
    //         $doc->users_id = $userId;
    //         $doc->visitors_id = $request->visitors_id[$index];
    //         $doc->activities_id = $request->activities_id[$index];
    //         $doc->documents_id = $request->documents_id[$index];
    //         $doc->description = $request->description[$index];
    //         $doc->file_path = $file_path;
    //         $doc->save();
    //     }

    //     // Set flash message untuk memberi feedback kepada pengguna
    //     Session::flash('status', 'Berhasil');
    //     Session::flash('message', 'Tambah Data Dokumen Lab Berhasil!');

    //     // Redirect ke halaman index setelah berhasil menyimpan
    //     return redirect('/koordinator-lab/dokumen-lab');
    // }

    public function tempSave(Request $request)
    {
        // Mengambil user yang login saat ini
        $coordinators = Auth::user();

        // Validasi input dari form
        $request->validate([
            'visitors_id.*' => 'required',
            'activities_id.*' => 'required',
            'documents_id.*' => 'required',
            'description.*' => 'required',
            'file_path.*' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png',
        ]);

        $tempData = $request->all();

        // Simpan file yang diunggah ke lokasi sementara dan simpan path ke dalam sesi
        if ($request->hasFile('file_path')) {
            foreach ($request->file('file_path') as $index => $file) {
                if ($file) {
                    $path = $file->storeAs('temp_docs', $file->getClientOriginalName());
                    $tempData['file_path'][$index] = $path;
                }
            }
        }

        // Simpan data form sementara di session
        $tempDocs = session('tempDocs', []);

        foreach ($request->visitors_id as $index => $visitorId) {
            $file_path = isset($tempData['file_path'][$index]) ? $tempData['file_path'][$index] : null;
    
            $tempDocs[] = [
                'users_id' => $coordinators->id, // Menyimpan users_id berdasarkan akun yang sedang login
                'visitors_id' => $visitorId,
                'activities_id' => $request->activities_id[$index],
                'documents_id' => $request->documents_id[$index],
                'description' => $request->description[$index],
                'file_path' => $file_path,
            ];
        }
    
        session(['tempDocs' => $tempDocs]);

        // Set flash message untuk memberi feedback kepada pengguna
        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Data sementara berhasil disimpan!');

        // Redirect ke halaman form dengan data sementara yang sudah disimpan
        return redirect('/koordinator-lab/dokumen-lab/temp');
    }

    public function showTemp()
    {
        $tempDocs = session('tempDocs', []);
        // Ambil data users dan documents dari database berdasarkan ID
        $coordinators = User::whereIn('id', array_column($tempDocs, 'users_id'))->get()->keyBy('id');
        $visitors = User::whereIn('id', array_column($tempDocs, 'visitors_id'))->get()->keyBy('id');
        $activities = Activity::whereIn('id', array_column($tempDocs, 'activities_id'))->get()->keyBy('id');
        $documents = Document::whereIn('id', array_column($tempDocs, 'documents_id'))->get()->keyBy('id');
        return view('koordinator-lab.dokumen-lab.dokumen-lab-temp', [
            'tempDocs' => $tempDocs,
            'coordinators' => $coordinators,
            'visitors' => $visitors,
            'activities' => $activities,
            'documents' => $documents,
        ]);
    }

    public function tempUpload()
    {
        // Mengambil user yang login saat ini
        $currentUser = Auth::user();

        $tempDocs = session('tempDocs', []);

        foreach ($tempDocs as $key => $tempDoc) {
            if ($tempDoc['users_id'] == $currentUser->id) {
                if (!empty($tempDoc['file_path'])) {
                    // Pindahkan file dari penyimpanan sementara ke penyimpanan permanen
                    $permanentPath = str_replace('temp_docs', 'docs', $tempDoc['file_path']);
                    Storage::move($tempDoc['file_path'], $permanentPath);

                    // Simpan jalur file yang dapat diakses oleh web server
                    $tempDoc['file_path'] = 'docs/' . basename($permanentPath);
                }

                // Simpan data ke database
                Doc::create([
                    'users_id' => $tempDoc['users_id'],
                    'visitors_id' => $tempDoc['visitors_id'],
                    'activities_id' => $tempDoc['activities_id'],
                    'documents_id' => $tempDoc['documents_id'],
                    'description' => $tempDoc['description'],
                    'file_path' => $tempDoc['file_path'],
                ]);

                // Hapus data sementara dari session setelah disimpan ke database
                unset($tempDocs[$key]);
            }
        }

        // Simpan kembali data yang tersisa ke session
        session(['tempDocs' => array_values($tempDocs)]);

        // Set flash message untuk memberi feedback kepada pengguna
        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Tambah Data Dokumen Lab Berhasil!');

        // Redirect ke halaman index setelah berhasil menyimpan
        return redirect('/koordinator-lab/dokumen-lab');
    }

    public function edit(Request $request, $id)
    {
        // Mengambil user yang login saat ini
        $coordinators = Auth::user();

        // Mengambil dokumen berdasarkan ID dan user yang login
        $doc = Doc::where('id', $id)->where('users_id', $coordinators->id)->first();

        if (!$doc) {
            // Jika dokumen tidak ditemukan atau tidak dimiliki oleh user yang login, kembali ke halaman dokumen lab dengan pesan error
            Session::flash('status', 'Error');
            Session::flash('message', 'Dokumen tidak ditemukan atau Anda tidak memiliki akses untuk mengedit dokumen ini.');
            return redirect('/koordinator-lab/dokumen-lab');
        }
        $visitors = User::where('roles_id', 3)->select('id', 'name')->get();
        $activities = Activity::where('coordinators_id', $coordinators->id)->select('id', 'activity_type')->get(); // Menampilkan kegiatan yang sesuai dengan koordinator lab yang sedang login
        $documents = Document::all();
        return view('koordinator-lab.dokumen-lab.dokumen-lab-edit', [
            'doc' => $doc, 
            'documents' => $documents, 
            'coordinators'=> $coordinators,
            'visitors' => $visitors,
            'activities' => $activities
        ]);
    }

    public function update(Request $request, $id)
    {
        // Mengambil user yang login saat ini
        $coordinators = Auth::user();

        // Mengambil dokumen berdasarkan ID dan user yang login
        $doc = Doc::where('id', $id)->where('users_id', $coordinators->id)->first();

        if (!$doc) {
            // Jika dokumen tidak ditemukan atau tidak dimiliki oleh user yang login, kembali ke halaman dokumen lab dengan pesan error
            Session::flash('status', 'Error');
            Session::flash('message', 'Dokumen tidak ditemukan atau Anda tidak memiliki akses untuk mengedit dokumen ini.');
            return redirect('/koordinator-lab/dokumen-lab');
        }

        // Validasi input
        $request->validate([
            'activities_id' => 'required',
            'documents_id' => 'required',
            'description' => 'required',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png',
        ]);

        // Mengupload file jika ada
        $file_path = $request->file('file_path') ? $request->file('file_path')->store('docs') : null;

        // mengubah nama file yang upload agr tidak acak
        $file_path = null;

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filename = $file->getClientOriginalName();
            $file_path = $file->storeAs('docs', $filename);
        }

        // Update dokumen baru menggunakan Eloquent
        $doc->activities_id = $request->activities_id;
        $doc->documents_id = $request->documents_id;
        $doc->description = $request->description;
        $doc->file_path = $file_path ?: $doc->file_path;
        $doc->save();

        // flesh message
        if($doc) {
            Session::flash('status', 'Berhasil');
            Session::flash('message', 'Ubah Data Dokumen Lab Berhasil!');
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect('/koordinator-lab/dokumen-lab');
    }

    public function destroy($id)
    {
        $doc = Doc::findOrFail($id);
        $doc->delete();

        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Hapus Data Dokumen Lab Berhasil!');
    
        return redirect('/koordinator-lab/dokumen-lab');
    }

    public function show($id)
    {
        $doc = Doc::with('documents', 'coordinators', 'visitors', 'activities')->findOrFail($id);
        return view('koordinator-lab.dokumen-lab.dokumen-lab-detail', compact('doc'));
    }

    public function showDetail($id)
    {
        $doc = Doc::with('coordinators', 'documents', 'visitors', 'activities')->findOrFail($id);
        return view('kepala-lab.dokumen-lab.dokumen-lab-detail', compact('doc'));
    }

    public function showDetails($id)
    {
        $doc = Doc::with('coordinators', 'documents', 'visitors', 'activities')->findOrFail($id);
        return view('pengunjung-lab.dokumen.dokumen-lab-detail', compact('doc'));
    }

    public function lihatDaftar($visitorId)
    {
        // Mengambil user yang login saat ini
        $coordinators = Auth::user();

        // Memeriksa apakah pengguna memiliki peran Lab Coordinator (roles_id = 2)
        if ($coordinators->roles_id == 2) {
            // Mengambil dokumen berdasarkan users_id dan visitors_id
            $docs = Doc::with('documents', 'coordinators', 'visitors', 'activities')
                ->where('users_id', $coordinators->id)
                ->where('visitors_id', $visitorId)
                ->get();

            // Mengambil informasi pengunjung
            $visitor = User::find($visitorId);

            return view('koordinator-lab.daftar-pengunjung.lihat-dokumen', [
                'docList' => $docs,
                'visitor' => $visitor,
            ]);
        } else {
            return redirect('/koordinator-lab/dashboard')->with('error', 'Anda tidak memiliki akses untuk halaman ini.');
        }
    }

}
