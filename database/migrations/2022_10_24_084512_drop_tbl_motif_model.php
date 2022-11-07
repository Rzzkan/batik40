<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropTblMotifModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('motif_model');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('motif_model', function (Blueprint $table) {
            $table->id('motif_id');
            $table->string('motif_nama');
            $table->string('motif_file');
            $table->timestamps();
        });
    }
}
