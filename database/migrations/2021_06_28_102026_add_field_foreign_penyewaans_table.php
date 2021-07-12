<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldForeignPenyewaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penyewaans', function (Blueprint $table) {
              $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
              $table->foreign('id_jadwal')->references('id')->on('jadwals')->onDelete('cascade');


           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penyewaans', function (Blueprint $table) {
            // $table->dropForeign(['users_id']);
            $table->dropForeign(['id_jadwal', 'users_id']);



        });
    }
}
