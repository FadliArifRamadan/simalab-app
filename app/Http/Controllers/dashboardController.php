<?php

namespace App\Http\Controllers;

use App\Models\ActivitySubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function kepalalab()
    {
        // Hitung jumlah setiap status pengajuan kegiatan
        $statuses = ['Pending', 'Approved', 'Progress', 'Rejected', 'Done'];
        $statusCounts = [];

        foreach ($statuses as $status) {
            $statusCounts[$status] = ActivitySubmission::where('status', $status)->count();
        }

        return view('kepala-lab.dashboard', ['statusCounts' => $statusCounts]);
    }

    public function koorlab()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Hitung jumlah setiap status pengajuan kegiatan yang diajukan oleh lab visitor kepada lab coordinator
        $statuses = ['Pending', 'Approved', 'Progress', 'Rejected', 'Done'];
        $statusCounts = [];

        foreach ($statuses as $status) {
            $statusCounts[$status] = ActivitySubmission::where('coordinators_id', $user->id)->where('status', $status)->count();
        }

        return view('koordinator-lab.dashboard',['statusCounts' => $statusCounts]);
    }

    public function pengunjunglab()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Hitung jumlah setiap status pengajuan kegiatan
        $statuses = ['Pending', 'Approved', 'Progress', 'Rejected', 'Done'];
        $statusCounts = [];

        foreach ($statuses as $status) {
            $statusCounts[$status] = ActivitySubmission::where('users_id', $user->id)->where('status', $status)->count();
        }

        return view('pengunjung-lab.dashboard', ['statusCounts' => $statusCounts]);
    }
}
