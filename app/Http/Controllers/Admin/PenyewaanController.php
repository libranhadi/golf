<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Models\Penyewaan;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\PenyewaanRequest;
use App\Models\Lapangan;
use App\Models\Pembayaran;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;

class PenyewaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if(request()->ajax()){
           $query = Penyewaan::with('user', 'jadwal')->latest();
           return Datatables::of($query)
           ->addColumn('action', function($penyewaan){
               return ' 
               <div class="btn-group">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-toggle="dropdown" >
                    Aksi
                    </button>
                  <div class="dropdown-menu">
               <a href="'. route('admin-edit-penyewaan', $penyewaan->id).'" class="dropdown-item">EDIT</a>
            
               <form action="'.route('admin-delete-penyewaan', $penyewaan->id).'" method="post">
             '.method_field('delete')  . csrf_field() .'
                            <button type="submit" class="dropdown-item text-danger">
                            Hapus
                            </button>
             </form>
               </div>
                </div>
               </div>   
               ';
           
           })->rawColumns(['action'])->make();
        }

    
        return view('Admin.Penyewaan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Penyewaan.create', [
            'penyewaan' => new Penyewaan(),
            'user' => User::where('roles', 'CUSTOMER')->orderBy('created_at', 'DESC')->get(),
            'jadwal' => Jadwal::get(),

    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenyewaanRequest $request)
    {
        $attr = $request->all();
        $code = 'SL' . '-' . mt_rand(000,999);

        $attr['kode_sewa'] = $code;
        $sewa = Penyewaan::create($attr);
        $kode = 'PL' . '-' . mt_rand(000,999);
       

        if ($sewa->status_penyewaan == 'SUDAH BAYAR') {
            
            Pembayaran::create([
                'users_id' => $sewa->users_id,
                'id_penyewaan' => $sewa->id,
                'id_jadwal' => $sewa->id_jadwal,
                'total_bayar' => $sewa->jadwal->harga,
                'kode_pembayaran' => $kode,
                'status_pembayaran' => 'SUCCESS',

            ]);
        }
        
    
        return redirect()->route('admin-penyewaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query = Jadwal::with('user')->findOrFail($id);
        return json_encode($query);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attr = Penyewaan::findOrFail($id);

        return view('Admin.Penyewaan.edit', [
            'penyewaan' => $attr,
            'jadwal' => Jadwal::orderBy('tanggal_main', 'DESC')->get(),
            'user' => User::where('roles', 'CUSTOMER')->get(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $attr = $request->all();
        
        // dd($attr);

        if ($request->kode_sewa) {
            # code...
            $code = 'SL' . '-' . mt_rand(000,999);
            $attr['kode_sewa'] = $code;
        } else {
            unset($attr['kode_sewa']);
        }

        $sewa =  Penyewaan::findOrFail($id);


        if ($request->status_penyewaan == 'BELUM BAYAR') {
         Pembayaran::with('penyewaan')->where('id_penyewaan', $sewa->id)->delete();
      
        } else{
          $kode = 'PL' . '-' . mt_rand(000,999);
            Pembayaran::create([
                'users_id' => $sewa->users_id,
                'id_penyewaan' => $sewa->id,
                'id_jadwal' => $sewa->id_jadwal,
                'total_bayar' => $sewa->jadwal->harga,
                'kode_pembayaran' => $kode,
                'status_pembayaran' => 'SUCCESS',
                

            ]);
        }



        $sewa->update($attr);




       
        return redirect()->route('admin-penyewaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function destroy($id){
        $penyewaan = Penyewaan::findOrFail($id);
        $penyewaan->delete();
        return redirect()->back();
    }
}
