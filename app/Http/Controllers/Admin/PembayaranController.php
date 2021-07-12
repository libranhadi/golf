<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PembayaranController extends Controller
{
    public function index(Request $request){
      if(request()->ajax()){
           $query = Pembayaran::with('user', 'jadwal' , 'penyewaan')->get();
           return Datatables::of($query)
           ->addColumn('photo', function($pembayaran){
            return '
              <div>
              <img src="'. $pembayaran->paid().'" alt="default" class="w-50" style="margin-top: -6px;
              padding-left: 10px;">
               </div>
               
            ';
           })
           ->addColumn('action', function($pembayaran){
               return ' 
            
               <div class="btn-group">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-toggle="dropdown" >
                    Aksi
                    </button>
                  <div class="dropdown-menu">
               <a href="'. route('admin-edit-pembayaran', $pembayaran->id).'" class="dropdown-item">EDIT</a>
            
               <form action="'.route('admin-delete-pembayaran', $pembayaran->id).'" method="post">
             '.method_field('delete')  . csrf_field() .'
                            <button type="submit" class="dropdown-item text-danger">
                            Hapus
                            </button>
             </form>
               </div>
                </div>
               </div>   
               ';
           
           })->rawColumns([ 'photo', 'action'])->make();
        }
        elseif ($request->tgl_awal & $request->tgl_akhir) {
            $test = Pembayaran::whereBetween($request->tgl_awal, $request->tgl_akhir);
            dd($test);
        }
        return view('Admin.Pembayaran.index');
        
    }

    public function edit($id){
      $pembayaran = Pembayaran::findOrFail($id);
      // dd($pembayaran);
      return view('Admin.Pembayaran.edit', compact('pembayaran') );
    }

    public function update(Request $request, $id){

      $attr = $this->validate($request, [
        'status_pembayaran' => 'required',
      ]);
      $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update($attr);
     return redirect()->route('admin-pembayaran');
    }

    public function delete($id){
      $attr = Pembayaran::findOrFail($id);
      $attr->delete();
      return redirect()->back();
    }
}
