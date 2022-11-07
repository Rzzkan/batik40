<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahKomponenTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->integer('id_alamat');
            $table->integer('berat');
            $table->string('resi');
            $table->string('ro_code');
            $table->string('ro_name');
            $table->string('ro_service');
            $table->string('ro_description');
            $table->integer('ro_cost');
            $table->string('ro_etd');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
