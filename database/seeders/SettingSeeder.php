<?php

namespace Database\Seeders;

use App\Models\SettingModel;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new SettingModel();
        $setting->id_kec_toko = 5780;
        $setting->no_toko = "0895802090232";
        $setting->url_desain = 'https://desain-batik40.com';
        $setting->save();
    }
}
