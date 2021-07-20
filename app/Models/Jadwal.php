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
        // rubah sebenrat
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function lapangan(){
        return $this->belongsTo(Lapangan::class, 'id_lapangan' , 'id');
    }
        public function sewa(){
        return $this->belongsTo(Penyewaan::class, 'id_jadwal', 'id');
    }
}
