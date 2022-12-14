<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableHasilBatikBaru extends Migration
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
            $table->string('hasilbatik_file')->nullable();
            $table->string('hasilbatik_filehp')->nullable();
            $table->dateTime('hasilbatik_tanggal')->nullable();
            $table->string('hasilbatik_kreator')->nullable();
            $table->string('hasilbatik_namakarya')->nullable();
            $table->integer('algoritma_id')->nullable();
            $table->integer('hasilbatik_jmlmotif')->nullable();
            $table->integer('hasilbatik_widthCanv')->nullable();
            $table->integer('hasilbatik_heightCanv')->nullable();
            $table->integer('hasilbatik_paddingTop')->nullable();
            $table->integer('hasilbatik_paddingSide')->nullable();

            $table->integer('hasilbatik_gap')->nullable();
            $table->integer('hasilbatik_gapX')->nullable();
            $table->integer('hasilbatik_gapY')->nullable();
            $table->integer('jumlahPembelian')->nullable();
            $table->string('teknik_pewarnaan')->nullable();
            $table->string('warna1')->nullable();
            $table->integer('jumlsh_warna1')->nullable();
            $table->string('warna2')->nullable();
            $table->integer('jumlsh_warna2')->nullable();
            $table->string('warna3')->nullable();
            $table->integer('jumlsh_warna3')->nullable();
            $table->string('warnaBg')->nullable();
            $table->integer('jumlsh_warnabg')->nullable();
            $table->integer('durasi')->nullable();
            $table->integer('manufacturing_duration')->nullable();
            $table->dateTime('manufacturing_date')->nullable();
            $table->integer('harga')->nullable();
            $table->string('status')->nullable();
            $table->string('status_bayar')->nullable();
            $table->integer('id_customer')->nullable();
            $table->integer('delivery_time')->nullable();
            $table->integer('last_id_in_process')->nullable();

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
