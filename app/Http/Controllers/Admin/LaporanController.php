<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jadwal;
use App\Models\Penyewaan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function cetak(){
        $laporan = Pembayaran::with('user', 'jadwal' , 'penyewaan')->get();
            

        return view('Admin.Laporan.index', [
            'laporan' => $laporan,
        ]);
    }
    public function range($tgl_awal, $tgl_akhir){
        
        $status = 'SUCCESS';
        $laporan= Pembayaran::with('user' , 'jadwal' , 'penyewaan')->where('status_pembayaran', $status)->whereBetween('created_at', [ $tgl_awal, $tgl_akhir])->orderBy('id', 'ASC')->get();
        $total = number_format($laporan->sum('total_bayar'));
        
            return response()->json([
            'messages' => 'data Success',
            'data' => $laporan,
            'total' => $total
             ]);
        
    }

    public function print($tgl_awal, $tgl_akhir){
         $status = 'SUCCESS';
        $laporan= Pembayaran::with('user' , 'jadwal' , 'penyewaan')->where('status_pembayaran', $status)->whereBetween('created_at', [ $tgl_awal, $tgl_akhir])->orderBy('created_at', 'ASC')->get();
        $total = number_format($laporan->sum('total_bayar'));
        // dd($laporan);
        $pdf = PDF::loadview('Admin.Laporan.cetak', ['laporan' => $laporan, 'total' => $total]);
        return $pdf->stream();
    }
}
