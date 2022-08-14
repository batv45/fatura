<?php

namespace App\Providers;

use furkankadioglu\eFatura\Exceptions\ApiException;
use furkankadioglu\eFatura\InvoiceManager;
use Illuminate\Support\ServiceProvider;

class eArsivServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(InvoiceManager::class, function($app) {
            $client =  new InvoiceManager();
//            $client->setDebugMode(true)->setTestCredentials();

            $user = $app->auth->user();
            if( $user  ){
                $client
                    ->setUsername( $user->settings()->get('earsiv.ivd_user') )
                    ->setPassword( $user->settings()->get('earsiv.ivd_pass') );
            }
            try {
                if( !request()->routeIs('account.settings.update') )
                    $client->connect();
            }catch (ApiException $e){
                flash('E-Arşiv bilgileri hatalı!')->error();
            }
            return $client;
        });
    }

    public function boot()
    {
    }
}
