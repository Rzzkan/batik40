<?php

namespace App\Providers;

use App\Models\CustomerModel;
use App\Models\SettingModel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data_setting = SettingModel::first();
        $data_user = null;
        if (auth()->user() != null) {
            $data_user = CustomerModel::where('id', '=', auth()->user()->id)->first();
        }

        $data = array(
            'data_setting' => $data_setting,
            'data_user' => $data_user,
        );

        View::share("data", $data);
    }
}
