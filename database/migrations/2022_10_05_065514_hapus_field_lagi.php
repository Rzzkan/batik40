<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HapusFieldLagi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biaya_mesin', function (Blueprint $table) {
            $table->dropColumn('biaya_lama');
            $table->dropColumn('biaya_baru');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('biaya_mesin', function (Blueprint $table) {
            $table->integer('biaya_lama');
            $table->integer('biaya_baru');
        });
    }
}
