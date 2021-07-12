<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
             $table->id();
            $table->unsignedBigInteger('users_id')->nullable();
           $table->unsignedBigInteger('id_lapangan')->nullable();
           $table->string('kode_jadwal', 20);
           $table->integer('harga');
            $table->date('tanggal_main');
            $table->time('jam_mulai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
}
