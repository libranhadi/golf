<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PelangganRequest;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
class PelangganController extends Controller
{
    public function index(){
          if(request()->ajax()){
           $query = User::where('roles', 'CUSTOMER')->get();
           return Datatables::of($query)
           ->addColumn('action', function($pelanggan){
               return ' 
                <form action="'.route('admin-delete-pelanggan', $pelanggan->id).'" method="post">
             '.method_field('delete')  . csrf_field() .'
                            <button type="submit" class="btn btn-danger">
                            Hapus
                            </button>
             </form>
               
               ';
           
           })->rawColumns(['action'])->make();
       }
        return view('Admin.Pelanggan.index');
    }
    public function create(){
        return view('Admin.Pelanggan.create', ['pelanggan' => new User()]);
    }
    public function store(PelangganRequest $request){
        $this->validate($request,[
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);
        $attr = $request->all();
        $attr['password'] = bcrypt($request->password);

        User::create($attr);
        return redirect()->route('admin-pelanggan');
    }
    public function edit($id){
        $pelanggan = User::findOrFail($id);
        return view('Admin.Pelanggan.edit', compact('pelanggan'));
    }
    public function update(PelangganRequest $request, $id){
        $attr = $request->all();
        $cus = User::findOrFail($id);
        if ($request->password) {
                $attr['password'] = bcrypt($request->password);    
        }else{
            unset($attr['password']);
        }
        $cus->update($attr);
        return redirect()->route('admin-pelanggan');

    }
    public function destroy($id){
        $pelanggan = User::findOrFail($id);
        $pelanggan->delete();
        return redirect()->back();
    }
}
