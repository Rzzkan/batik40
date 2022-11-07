<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteKel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alamat', function (Blueprint $table) {
            $table->dropColumn('id_kel');
            $table->dropColumn('nama_kel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alamat', function (Blueprint $table) {
            $table->integer("id_kel");
            $table->string("nama_kel");
        });
    }
}
