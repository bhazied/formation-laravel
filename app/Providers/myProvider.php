<?php

namespace App\Providers;

use App\Test;
use App\TestInterface;
use Illuminate\Support\ServiceProvider;

class myProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TestInterface::class, function(){
            return new Test();
        });
    }

    public function provides()
    {
        return [TestInterface::class];
    }
}
