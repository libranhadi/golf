<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\PelangganRequest;
class ProfileController extends Controller
{
    public function edit($name){
        
        $user = User::where('name', $name)->firstOrFail();
        return view('pages.profile', compact('user'));
    }
    public function update(PelangganRequest $request,$id){
       $attr = $request->all();
        $cus = User::findOrFail($id);
        if ($request->password) {
                $attr['password'] = bcrypt($request->password);    
        }else{
            unset($attr['password']);
        }
        $cus->update($attr);
        return redirect()->route('home');
    }
}
