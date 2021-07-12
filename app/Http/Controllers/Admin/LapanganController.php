<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lapangan;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\LapanganRequest;

class LapanganController extends Controller
{
    public function index(){
       if(request()->ajax()){
           $query = Lapangan::query();
           return Datatables::of($query)
           ->addColumn('action', function($lapangan){
               return ' 
               <div class="btn-group">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-toggle="dropdown" >
                    Aksi
                    </button>
                  <div class="dropdown-menu">
               <a href="'. route('admin-edit-lapangan', $lapangan->id) .'" class="dropdown-item">EDIT</a>
            
               <form action="'. route('admin-destroy-lapangan', $lapangan->id) .'" method="post">
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
        return view('Admin.Lapangan.index');
    }

    public function create(){
        return view('Admin.Lapangan.create');
    }

    public function store(LapanganRequest $request){
        $attr = $request->all();
        Lapangan::create($attr);
        return redirect()->route('admin-lapangan');
    }

    public function edit($id){
        $lapangan = Lapangan::findOrFail($id);
        return view('Admin.Lapangan.edit', compact('lapangan')
        );
    }

    public function update(LapanganRequest $request, $id){
        $attr = $request->all();
        $items = Lapangan::findOrFail($id);
        $items->update($attr);
        return redirect()->route('admin-lapangan');
    }

    public function destroy($id){
        $attr = Lapangan::findOrFail($id);
        $attr->delete();
        return redirect()->route('admin-lapangan');
    }
}
