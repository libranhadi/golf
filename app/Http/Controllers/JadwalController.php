<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
class JadwalController extends Controller
{
    public function index(){
        // $current = Carbon::now();
        // $current = new Carbon();
        // return view('pages.penyewaan', compact($current));
        return view('pages.jadwal');
    }
}
