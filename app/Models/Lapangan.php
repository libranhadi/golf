<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    use HasFactory;

     

    protected $fillable = ['kode_lapangan' , 'tee_box'];
    // public function jadwal(){

    //     return $this->belongsTo(Jadwal::class, 'id_lapangan' , 'id');
    // }

}
