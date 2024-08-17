<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ActivitySubmission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ActivitySubmissionController extends Controller
{
    public function pengunjung()
    {
        // Mengambil user yang login saat ini
        $user = Auth::user();

        // Memeriksa apakah pengguna memiliki peran Lab Visitor (roles_id = 3)
        if ($user->roles_id == 3) {
            $activitySubmissionQuery = ActivitySubmission::with('visitors', 'coordinators', 'activities')
            ->where('users_id', $user->id); // Memfilter berdasarkan ID koordinator saat ini
        }

        $activitySubmission = $activitySubmissionQuery->get(); // Mengambil user dengan roles_id = 3 (Lab Visitor) dan roles_id = 2 (Lab Coordinator)

        $visitors = User::where('roles_id', 3)->get();// Lab Visitors
        $coordinators = User::where('roles_id', 2)->get(); // Lab Coordinators
        $activities = Activity::all(); // Semua Activity

        return view('pengunjung-lab.pengajuan-kegiatan.pengajuan-kegiatan', [
            'activitySubmission' => $activitySubmission,
            'visitors' => $visitors,
            'coordinators' => $coordinators,
            'activities' => $activities
        ]);
    }

    public function koorlab()
    {
        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();

        // Memeriksa apakah pengguna memiliki peran Lab Coordinator (roles_id = 2)
        if ($user->roles_id == 2) {
            $activitySubmissionQuery = ActivitySubmission::with('visitors', 'coordinators', 'activities')
            ->where('coordinators_id', $user->id); // Memfilter berdasarkan ID koordinator saat ini
        }

        $activitySubmission = $activitySubmissionQuery->get();

        $visitors = User::where('roles_id', 3)->get();// Lab Visitors
        $coordinators = User::where('roles_id', 2)->get(); // Lab Coordinators
        $activities = Activity::all(); // Semua Activity

        return view('koordinator-lab.pengajuan-kegiatan.pengajuan-kegiatan', [
            'activitySubmission' => $activitySubmission,
            'visitors' => $visitors,
            'coordinators' => $coordinators,
            'activities' => $activities
        ]);
    }

    public function kepalalab()
    {
        $activitySubmission = ActivitySubmission::with('visitors', 'coordinators', 'activities')->get();
        $visitors = User::where('roles_id', 3)->get();// Lab Visitors
        $coordinators = User::where('roles_id', 2)->get(); // Lab Coordinators
        $activities = Activity::all(); // Semua Activity

        return view('kepala-lab.pengajuan-kegiatan.pengajuan-kegiatan', [
            'activitySubmission' => $activitySubmission,
            'visitors' => $visitors,
            'coordinators' => $coordinators,
            'activities' => $activities
        ]);
    }

    public function create()
    {
        // Mengambil user yang login saat ini
        $visitors = Auth::user();

        // Mengambil data dari relasi dengan tabel users dan activities
        $coordinators = User::where('roles_id', 2)->select('id', 'name')->get();
        $activities = Activity::select('id', 'activity_type')->get();

        // Mengembalikan view dengan data users, coordinators, labs, dan activities
        return view('pengunjung-lab.pengajuan-kegiatan.pengajuan-kegiatan-add', [
            'visitors' => $visitors,
            'coordinators' => $coordinators,
            'activities' => $activities
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'coordinators_id' => 'required',
            'activities_id' => 'required',
        ], [
            'coordinators_id.required' => 'Nama Koordinator Lab wajib dipilih',
            'activities_id.required' => 'Jenis Kegiatan wajib dipilih',
        ]);

         // Mengambil user yang login saat ini
        $visitors = Auth::user();

        // Membuat Pengajuan baru menggunakan model ActivitySubmission
        $activitySubmission = new ActivitySubmission();
        $activitySubmission->users_id = $visitors->id; // Mengambil ID user yang sedang login
        $activitySubmission->coordinators_id = $request->coordinators_id;
        $activitySubmission->activities_id = $request->activities_id;
        $activitySubmission->save();

        // flesh message
        if($activitySubmission) {
            Session::flash('status', 'Berhasil');
            Session::flash('message', 'Tambah Pengajuan Kegiatan Berhasil!');
        }

        return redirect('/pengunjung-lab/pengajuan-kegiatan');
    }

    public function edit(Request $request, $id)
    {
        // Mengambil user yang login saat ini
        $visitors = Auth::user();

        // Menemukan pengajuan kegiatan berdasarkan ID
        $activitySubmission = ActivitySubmission::findOrFail($id);

        // Menemukan Pengunjung Lab, Koordinator Lab, dan Activities (opsional, untuk ditampilkan di dropdown)
        $coordinators = User::where('roles_id', 2)->select('id', 'name')->get();
        $activities = Activity::where('coordinators_id', $activitySubmission->coordinators_id)->get();

        // Mengembalikan view dengan data visitors, coordinators, labs, dan activities
        return view('pengunjung-lab.pengajuan-kegiatan.pengajuan-kegiatan-edit', [
            'activitySubmission' => $activitySubmission,
            'visitors' => $visitors,
            'coordinators' => $coordinators,
            'activities' => $activities
        ]);
    }

    public function editKoorlab(Request $request, $id)
    {
        // Mengambil user yang login saat ini
        $coordinators = Auth::user();

        // Menemukan pengajuan kegiatan berdasarkan ID
        $activitySubmission = ActivitySubmission::findOrFail($id);

        // Menemukan Pengunjung Lab, Koordinator Lab, dan Activities (opsional, untuk ditampilkan di dropdown)
        $visitors = User::where('roles_id', 3)->select('id', 'name')->get();

        // Data ketersediaan waktu berdasarkan koordinator lab
        $availability = [
            'Koor Lab Halal Center' => [
                'days' => ['Monday', 'Tuesday', 'Wednesday'],
                'times' => ['13:00', '13:30', '14:00', '14:30', '15:00']
            ],
            'Koor Lab Kewirausahaan' => [
                'days' => ['Monday', 'Tuesday', 'Wednesday'],
                'times' => ['13:00', '13:30', '14:00', '14:30', '15:00']
            ],
            'Koor Lab Multimedia dan Digital marketing' => [
                'days' => ['Monday', 'Tuesday', 'Wednesday'],
                'times' => ['13:00', '13:30', '14:00', '14:30', '15:00']
            ],
            'Koor Lab Ekspor dan Impor' => [
                'days' => ['Thursday', 'Friday'],
                'times' => ['13:00', '13:30', '14:00', '14:30', '15:00']
            ],
            'Koor Lab Perpajakan' => [
                'days' => ['Thursday', 'Friday'],
                'times' => ['13:00', '13:30', '14:00', '14:30', '15:00']
            ],
            'Koor Lab Bisnis dan Properti' => [
                'days' => ['Thursday', 'Friday'],
                'times' => ['13:00', '13:30', '14:00', '14:30', '15:00']
            ],
            'Koor Lab Programming' => [
                'days' => ['Thursday', 'Friday'],
                'times' => ['13:00', '13:30', '14:00', '14:30', '15:00']
            ],
        ];

        // Fungsi untuk mendapatkan tanggal-tanggal yang tersedia berdasarkan hari
        function getAvailableDates($days, $numWeeks = 4) {
            $availableDates = [];
            $currentDate = new \DateTime();

            for ($i = 0; $i < $numWeeks * 7; $i++) {
                if (in_array($currentDate->format('l'), $days)) {
                    $availableDates[] = $currentDate->format('Y-m-d');
                }
                $currentDate->modify('+1 day');
            }

            return $availableDates;
        }

        // Mengubah hari menjadi tanggal
        $availabilityDates = [];
        foreach ($availability as $key => $value) {
            $availabilityDates[$key] = getAvailableDates($value['days']);
        }

        // Filter waktu yang sudah digunakan pada tanggal tertentu
        $usedTimes = ActivitySubmission::where('submission_date', $activitySubmission->submission_date)
            ->where('coordinators_id', $coordinators->id)
            ->pluck('submission_time')->toArray();

        // Mengembalikan view dengan data users, coordinators, labs, dan activities
        return view('koordinator-lab.pengajuan-kegiatan.pengajuan-kegiatan-edit', [
            'activitySubmission' => $activitySubmission,
            'coordinators' => $coordinators,
            'visitors' => $visitors,
            'availability' => $availability,
            'availabilityDates' => $availabilityDates,
            'usedTimes' => $usedTimes,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Mengambil user yang login saat ini
        $visitors = Auth::user();

        // Validasi input
        $request->validate([
            'coordinators_id' => 'required',
            'activities_id' => 'required',
        ]);

        $activitySubmission = ActivitySubmission::findOrFail($id);
        $activitySubmission->users_id = $visitors->id;
        $activitySubmission->coordinators_id = $request->coordinators_id;
        $activitySubmission->activities_id = $request->activities_id;
        $activitySubmission->save();

        // flesh message
        if($activitySubmission) {
            Session::flash('status', 'Berhasil');
            Session::flash('message', 'Ubah Pengajuan Kegiatan Berhasil!');
        }

        return redirect('/pengunjung-lab/pengajuan-kegiatan');
    }

    public function updateKoorlab(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'submission_date' => 'required|date',
            'submission_time' => 'required',
        ]);

         // Periksa apakah waktu tersebut sudah digunakan pada tanggal tersebut
        $exists = ActivitySubmission::where('submission_date', $request->submission_date)
                                    ->where('submission_time', $request->submission_time)
                                    ->where('coordinators_id', Auth::user()->id)
                                    ->where('id', '!=', $id) // Exclude current record
                                    ->exists();

        if ($exists) {
        return redirect()->back()->withErrors(['submission_time' => 'Waktu yang dipilih sudah digunakan. Silakan pilih waktu lain.']);
        }

        $activitySubmission = ActivitySubmission::findOrFail($id);
        $activitySubmission->submission_date = $request->submission_date;
        $activitySubmission->submission_time = $request->submission_time;
        $activitySubmission->save();

        // flesh message
        if($activitySubmission) {
            Session::flash('status', 'Berhasil');
            Session::flash('message', 'Ubah Pengajuan Kegiatan Berhasil!');
        }

        return redirect('/koordinator-lab/pengajuan-kegiatan');
    }

    public function destroy($id)
    {
        $activitySubmission = ActivitySubmission::findOrFail($id);
        $activitySubmission->delete();

        // flesh message
        if($activitySubmission) {
            Session::flash('status', 'Berhasil');
            Session::flash('message', 'Hapus Pengajuan Kegiatan Berhasil!');
        }

        return redirect('/pengunjung-lab/pengajuan-kegiatan');
    }

    public function approve($id)
    {
        $activitySubmission = ActivitySubmission::findOrFail($id);
        $activitySubmission->status = 'Approved';
        $activitySubmission->save();

        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Pengajuan Kegiatan Disetujui!');

        return redirect('/koordinator-lab/pengajuan-kegiatan');
    }

    public function reject($id)
    {
        $activitySubmission = ActivitySubmission::findOrFail($id);
        $activitySubmission->status = 'Rejected';
        $activitySubmission->save();

        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Pengajuan Kegiatan Ditolak!');

        return redirect('/koordinator-lab/pengajuan-kegiatan');
    }

    public function progress($id)
    {
        $activitySubmission = ActivitySubmission::findOrFail($id);
        $activitySubmission->status = 'Progress';
        $activitySubmission->save();

        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Pengajuan Kegiatan Berjalan!');

        return redirect('/koordinator-lab/pengajuan-kegiatan');
    }

    public function done($id)
    {
        $activitySubmission = ActivitySubmission::findOrFail($id);
        $activitySubmission->status = 'Done';
        $activitySubmission->save();

        Session::flash('status', 'Berhasil');
        Session::flash('message', 'Pengajuan Kegiatan Selesai!');

        return redirect('/koordinator-lab/pengajuan-kegiatan');
    }

    public function getActivitiesByCoordinator(Request $request)
    {
        $coordinatorId = $request->coordinator_id;
        $activities = Activity::where('coordinators_id', $coordinatorId)->get();

        return response()->json($activities);
    }

    // public function getAvailableTimesByCoordinator(Request $request)
    // {
    //     $coordinatorId = $request->input('coordinator_id');

    //     // Waktu yang tersedia untuk semua koordinator lab
    //     $times = [
    //         '13:00', '13:30', '14:00', '14:30', '15:00'
    //     ];

    //     // Ambil waktu yang sudah digunakan pada tanggal yang dipilih
    //     $usedTimes = ActivitySubmission::where('coordinators_id', $coordinatorId)
    //         ->whereDate('submission_date', '=', $request->input('submission_date'))
    //         ->pluck('submission_time')
    //         ->toArray();

    //     // Filter waktu yang tersedia berdasarkan waktu yang sudah digunakan
    //     $availableTimes = array_diff($times, $usedTimes);

    //     return response()->json(array_values($availableTimes));
    // }
}
