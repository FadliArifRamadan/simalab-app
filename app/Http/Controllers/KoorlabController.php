<?php

namespace App\Http\Controllers;

use App\Models\Koorlab;
use Illuminate\Http\Request;

class KoorlabController extends Controller
{
    public function index()
    {
        $koorlab = Koorlab::all();
        return view('labhead.koor-lab', ['koorlabList' => $koorlab]);
    }
}
