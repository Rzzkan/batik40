<?php

namespace Database\Seeders;

use App\Models\Biaya_mesin;
use Illuminate\Database\Seeder;

class BiayaMesinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $biaya_mesin = new Biaya_mesin();
        $biaya_mesin->member = 10000;
        $biaya_mesin->non_member = 20000;
        $biaya_mesin->save();
    }
}
