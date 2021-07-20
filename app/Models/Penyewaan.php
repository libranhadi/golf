<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;
    
    protected $fillable = ['users_id', 'id_jadwal', 'status_penyewaan', 'nama_penyewa', 'kode_sewa'];
    public function user(){
        return $this->belongsTo(User::class, 'users_id' , 'id');

    }
    public function jadwal(){
        return $this->hasOne(Jadwal::class, 'id', 'id_jadwal');
    }
    public function pembayaran(){
        return $this->belongsTo(Pembayaran::class, 'id' , 'id_penyewaan');
    }

    
}
