<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJtblHasilbatikMotif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jtbl_hasilbatik_motif', function (Blueprint $table) {
            $table->id();
            $table->integer('hasilbatik_id');
            $table->integer('motif_id');
            $table->integer('urutan');
            $table->integer('ukuran');
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
        Schema::dropIfExists('jtbl_hasilbatik_motif');
    }
}
