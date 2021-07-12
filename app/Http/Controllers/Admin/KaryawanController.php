<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PelangganRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class KaryawanController extends Controller
{
      public function index(){
          if(request()->ajax()){
           $query = User::where('roles', 'KARYAWAN')->get();
           return Datatables::of($query)
           ->addColumn('action', function($karyawan){
               return ' 
               <div class="btn-group">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-toggle="dropdown" >
                    Aksi
                    </button>
                  <div class="dropdown-menu">
               <a href="'. route('admin-edit-karyawan', $karyawan->id).'" class="dropdown-item">EDIT</a>
            
               <form action="'.route('admin-delete-karyawan', $karyawan->id).'" method="post">
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
        return view('Admin.Karyawan.index');
    }
    public function create(){
        return view('Admin.Karyawan.create', ['karyawan' => new User()]);
    }
    public function store(PelangganRequest $request){
        $this->validate($request,[
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'roles' => ['string'],
        ]);
        $attr=$request->all();
        $attr['password'] = bcrypt($request->password);
        User::create($attr);
        return redirect()->route('admin-karyawan');
    }
    public function edit($id){
        $karyawan = User::findOrFail($id);

        return view('Admin.Karyawan.edit', compact('karyawan'));

    }
    public function update(PelangganRequest $request, $id){
         $this->validate($request,[
            'password' => ['min:6'],
            'roles' => ['string'],
        ]);
        $attr=$request->all();
        $karyawan = User::findOrFail($id);
        if ($request->password) {
            $attr['password'] = bcrypt($request->password);

        }else{
            unset($attr['password'] );

        }
        $karyawan->update($attr);
        return redirect()->route('admin-karyawan');
        
    }
    public function destroy($id){
         $pelanggan = User::findOrFail($id);
        
        $pelanggan->delete();
        return redirect()->back();
    }
}
