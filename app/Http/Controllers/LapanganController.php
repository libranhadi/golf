<?php

namespace App\Http\Controllers;

use App\Http\Requests\LapanganRequest;
use App\Models\Lapangan;
// use Illuminate\Http\Request;
// use PDO;

class LapanganController extends Controller
{
    public function index(){

    }
    public function create(){
        return view('pages.admin.lapangan');
    }
    public function store(LapanganRequest $request){
        $store = $request->all();
        Lapangan::create($store);
        return redirect()->back();
    }
}
