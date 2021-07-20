<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Penyewaan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function create($id){
        $bayar = Penyewaan::with(['user' , 'jadwal'])->find($id);
       
        return view('pages.bayar', [
            'bayar' => $bayar
        ]);
    }
    public function store(Request $request, $id){
        $this->validate($request,[
            'users_id' => 'required',
            'id_jadwal' => 'required',
            'total_bayar' => 'required',
            'bukti_bayar' => 'required|image'
        ]);
        $kode = 'PL' . '-' . mt_rand(000,999);
       
         $bayar =  Pembayaran::create([
                'users_id' => $request->users_id,
                'id_penyewaan' => $id,
                'id_jadwal' => $request->id_jadwal,
                'total_bayar' => $request->total_bayar,
                'kode_pembayaran' => $kode,
                'bukti_bayar' => $request->file('bukti_bayar')->store('assets/pembayaran', 'public')
            ]);

            if ($bayar) {
                $sewa = Penyewaan::findOrFail($id);
                   $sewa->update([
                    'status_penyewaan' => 'SUDAH BAYAR'
                ]);
            }
            return redirect()->route('home');
    }
}
