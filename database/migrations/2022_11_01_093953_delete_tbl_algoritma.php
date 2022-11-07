<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteTblAlgoritma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tbl_algoritma');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('tbl_algoritma', function (Blueprint $table) {
            $table->id();
            $table->integer('algoritma_id');
            $table->string('algoritma_nama');
            $table->integer('algoritma_maksmotif');
            $table->timestamps();
        });
    }
}
