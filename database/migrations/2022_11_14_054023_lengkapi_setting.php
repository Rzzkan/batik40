<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LengkapiSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('setting', function (Blueprint $table) {
            $table->string('nama_kec_toko');
            $table->integer('id_prov_toko');
            $table->string('nama_prov_toko');
            $table->integer('id_kab_toko');
            $table->string('nama_kab_toko');
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
