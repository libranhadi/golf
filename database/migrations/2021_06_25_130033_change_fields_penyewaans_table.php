<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFieldsPenyewaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penyewaans', function (Blueprint $table) {
            $table->foreignId('id_pelanggan')->unsigned()->change();
            $table->string('status_penyewaan')->default('BELUM BAYAR')->change();
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
            $table->integer('id_pelanggan')->unsigned()->change();

            $table->string('status_penyewaan')->default('BELUM BAYAR')->change();

        });
    }
}
