<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Services\Checkr\DriverCheckrInterface;
use App\Library\Services\Checkr\DriverChecker;
use App\Library\Services\Submission\SubmissionService;
use Lyal\Checkr\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, function ($app) {
            return new Client(config('services.checkr.key'));
        });

        $this->app->singleton(DriverCheckrInterface::class, function ($app) {
            return $this->app->make(DriverChecker::class);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
