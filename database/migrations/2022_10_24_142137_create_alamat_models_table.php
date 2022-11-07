<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamat', function (Blueprint $table) {
            $table->id();
            $table->integer("id_user");
            $table->string("penerima");
            $table->string("no_hp");
            $table->string("alamat");
            $table->string("alias");
            $table->integer("id_prov");
            $table->integer("id_kab");
            $table->integer("id_kec");
            $table->integer("id_kel");
            $table->string("nama_prov");
            $table->string("nama_kab");
            $table->string("nama_kec");
            $table->string("nama_kel");
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
        Schema::dropIfExists('alamat');
    }
}
