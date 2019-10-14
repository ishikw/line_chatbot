<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use LINE\LINEBot;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!defined('ADMIN')) {
           define('ADMIN', config('variables.APP_ADMIN', 'admin'));
        }
        require_once base_path('resources/macros/form.php');
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        // LINE BOT
        $this->app->bind('line-bot', function ($app, array $parameters) {
            // $parametersを見て、SECRETとかTOKENをDBとかNoSQLから取ってくることが多い
            return new LINEBot(
                new LINEBot\HTTPClient\CurlHTTPClient(env('LINE_ACCESS_TOKEN')),
                ['channelSecret' => env('LINE_CHANNEL_SECRET')]
            );
        });
    }
}
