<?php

namespace App\Providers;

use App\Models\Compamy_contact;
use App\Models\Slider_image;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Auth;
use DB;

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

        $companyContact = Compamy_contact::first();

        $homeSliders = Slider_image::orderBy('order', 'asc')->get();
        View::share(['homeSliders'=>$homeSliders,'companyContact'=>$companyContact]);

    }
}
