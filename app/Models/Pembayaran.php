<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = ['users_id' , 'id_penyewaan', 'id_jadwal', 'total_bayar', 'kode_pembayaran' , 'status_pembayaran', 'bukti_bayar'];

    public function penyewaan(){
        return $this->hasOne(Penyewaan::class, 'id' , 'id_penyewaan');
    }
    // pembayaran memiliki 1 jadwal menuju id yang ada pada jadwal . dan id_jadwal adalah foreign yg ada di table
    public function jadwal(){
        return $this->hasOne(Jadwal::class, 'id', 'id_jadwal');
    }
    //pembayaran menuju user dengan relasi satu user memiliki banyak pembayaran
    public function user(){
        return $this->belongsTo(User::class, 'users_id','id');
    }

    public function paid(){
        if (!$this->bukti_bayar) {
            return asset('images/default.png');
        }
        return Storage::url($this->bukti_bayar);
    }
   
}
