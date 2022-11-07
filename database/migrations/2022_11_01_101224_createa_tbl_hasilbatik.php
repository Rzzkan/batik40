<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateaTblHasilbatik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hasilbatik', function (Blueprint $table) {
            $table->id('hasilbatik_id');
            $table->string('hasilbatik_file');
            $table->string('hasilbatik_filehp');
            $table->dateTime('hasilbatik_tanggal');
            $table->string('hasilbatik_kreator');
            $table->string('hasilbatik_namakarya');
            $table->integer('algoritma_id');
            $table->integer('hasilbatik_jmlmotif');
            $table->integer('hasilbatik_widthCanv');
            $table->integer('hasilbatik_heightCanv');
            $table->integer('hasilbatik_paddingTop');
            $table->integer('hasilbatik_paddingSide');

            $table->integer('hasilbatik_gap');
            $table->integer('hasilbatik_gapX');
            $table->integer('hasilbatik_gapY');
            $table->integer('jumlahPembelian');
            $table->string('teknik_pewarnaan');
            $table->string('warna1');
            $table->integer('jumlsh_warna1');
            $table->string('warna2');
            $table->integer('jumlsh_warna2');
            $table->string('warna3');
            $table->integer('jumlsh_warna3');
            $table->string('warnaBg');
            $table->integer('jumlsh_warnabg');
            $table->integer('durasi');
            $table->integer('manufacturing_duration');
            $table->dateTime('manufacturing_date');
            $table->integer('harga');
            $table->string('status');
            $table->string('status_bayar');
            $table->integer('id_customer');
            $table->integer('delivery_time');
            $table->integer('last_id_in_process');

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
        Schema::dropIfExists('tbl_hasilbatik');
    }
}
