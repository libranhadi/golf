<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Lapangan;
use Yajra\DataTables\Facades\DataTables;
class PagesController extends Controller
{
     public function jadwal(){
        if (request()->ajax()) {
            $query = Jadwal::with('user' , 'lapangan')->orderBy('tanggal_main', 'DESC');
            return Datatables::of($query)->make();
        }
    //       if(request()->ajax()){
    //        $query = Jadwal::with('user', 'lapangan');
    //        return Datatables::of($query)->make();
    //    }
        return view('pages.jadwal' );
    }
    public function lapangan(){
        $lapangan = Lapangan::all();
        return view('pages.lapangan', compact('lapangan'));
    }
}
