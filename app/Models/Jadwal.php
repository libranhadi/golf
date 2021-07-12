<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'users_id' , 'id_lapangan', 'kode_jadwal', 'harga', 'tanggal_main', 'jam_mulai'
    ];
    public function user(){
        return $this->hasOne(User::class, 'id', 'users_id');
    }
    public function lapangan(){
        return $this->belongsTo(Lapangan::class, 'id_lapangan' , 'id');
    }
        public function sewa(){
        return $this->belongsTo(Penyewaan::class, 'id_jadwal', 'id');
    }
}
