<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->integer('users_id');
            $table->foreignId('id_penyewaan')->constrained('penyewaans')->onDelete('cascade');
            $table->foreignId('id_jadwal')->constrained('jadwals')->onDelete('cascade');
            $table->string('bukti_bayar')->nullable();
            $table->integer('total_bayar');
            $table->string('kode_pembayaran');
            $table->string('status_pembayaran')->default('PENDING');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('pembayarans');
    }
}
