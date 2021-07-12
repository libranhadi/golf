<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Lapangan;
use App\Models\User;
use App\Http\Requests\JadwalRequest;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if(request()->ajax()){
           $query = Jadwal::with('user', 'lapangan');
           return Datatables::of($query)
           ->addColumn('action', function($jadwal){
               return ' 
               <div class="btn-group">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-toggle="dropdown" >
                    Aksi
                    </button>
                  <div class="dropdown-menu">
               <a href="'. route('admin-edit-jadwal', $jadwal->id).'" class="dropdown-item">EDIT</a>
            
               <form action="'.route('admin-delete-jadwal', $jadwal->id).'" method="post">
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
        return view('Admin.Jadwal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Admin.Jadwal.create', [
            'jadwal' => new Jadwal(),
            'user' => User::where('roles', 'CUSTOMER')->get(),
            'lapangan' => Lapangan::get(),
        ]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JadwalRequest $request)
    {
        $attr = $request->all();
        $code = 'JM' . '-' . mt_rand(000,999);
        $attr['harga'] = $request->harga;
        $attr['kode_jadwal'] = $code;
        Jadwal::create($attr);

       
        return redirect()->route('admin-jadwal');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal = Jadwal::findOrfail($id);
        return view('Admin.Jadwal.edit', [
            'jadwal' => $jadwal,
            'user' => User::where('roles', 'CUSTOMER')->get(),
            'lapangan' => Lapangan::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JadwalRequest $request, $id)
    {
        $attr = $request->all();
        $attr['harga'] = $request->harga;
        if ($request->kode_jadwal) {
            # code...
            $code = 'JM' . '-' . mt_rand(000,999);
            $attr['kode_jadwal'] = $code;
        } else {
            unset($attr['kode_jadwal']);
        }
        
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($attr);
        return redirect()->route('admin-jadwal');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        return redirect()->back();
    }
    public function check(JadwalRequest $request){
        // Jadwal::where('tanggal_main', $request->tanggal_main)->count() > 0 ? 'unavailable' : 'available' ;
        $tanggal =  Jadwal::get(); 
        return json_encode($tanggal);
    }
}
