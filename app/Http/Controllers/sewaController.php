<?php

namespace App\Http\Controllers;

use App\Models\{Jadwal, Lapangan};
use App\Models\Penyewaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SewaController extends Controller
{
    public function index($id){
        $penyewaan = Penyewaan::with(['user', 'jadwal', 'pembayaran'])->where('users_id', $id)->get();
        return view('pages.history-sewa', 
            [
                'penyewaan' => $penyewaan
            ] 
        );
    }

    public function create(){
        return view('pages.penyewaan', [
            'lapangan' => Lapangan::all()
        ]);
    }
    public function store(Request $request){
       $this->validate($request,[
            'id_lapangan' => 'required',
            'harga' => 'required|integer',
            'tanggal_main' => 'required',
            'jam_mulai' => 'required',
            
        ]);
       $kode_jadwal =  'JM' . '-' . mt_rand(000,999);
        $jadwal = Jadwal::create([
            'users_id' => Auth::user()->id,
            'id_lapangan' => $request->id_lapangan,
            'harga' => $request->harga,
            'tanggal_main' => $request->tanggal_main,
            'jam_mulai' => $request->jam_mulai,
            'kode_jadwal' => $kode_jadwal
        ]);
        $kode_sewa =  'SL' . '-' . mt_rand(000,999);
        Penyewaan::create([
            'users_id' => Auth::user()->id,
            'id_jadwal' => $jadwal->id,
            'kode_sewa' => $kode_sewa,
           
        ]);
        return redirect()->route('home');
    }

    public function show($id){
        $detail = Penyewaan::with(['pembayaran' , 'jadwal'])->findOrFail($id);
        return view('pages.detail', ['detail'=> $detail]);
    }
    public function destroy($id){
        $del = Penyewaan::findOrfail($id);
        $del->delete();
        Jadwal::where('id', $del->id_jadwal)->delete();

        return redirect()->back();
    }
}
