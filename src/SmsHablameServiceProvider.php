<?php

namespace Danilo\SmsHablame;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class SmsHablameServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        App::bind('sms-hablame', function () {
            return new Hablame(
                Config::get('services.sms-hablame.cliente'),
                Config::get('services.sms-hablame.api'),
                Config::get('services.sms-hablame.token'),
            );
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
