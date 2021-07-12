<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFieldPenyewaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penyewaans', function (Blueprint $table) {
        //    $table->foreignId('id_jadwal')->constrained('jadwals')->change();
           $table->unsignedBigInteger('users_id')->nullable()->change();
           $table->unsignedBigInteger('id_jadwal')->nullable()->change();


            
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
            // $table->dropColumn('users_id');
            // $table->dropColumn(['id_jadwal', 'users_id']);
            $table->unsignedBigInteger('users_id')->nullable();
           $table->unsignedBigInteger('id_jadwal')->nullable();
        //    $table->foreignId('id_jadwal')->constrained('jadwals')->change();

        });
    }
}
