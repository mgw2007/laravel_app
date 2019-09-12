<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Listeners\VehicleEventSubscriber;
use App\Listeners\TrailerEventSubscriber;
use App\Listeners\DriverEventSubscriber;
use App\Listeners\BuildersRiskSubscriber;
use App\Listeners\EquipmentSubscriber;
use App\Listeners\UserEventSubscriber;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\Transportation\Creating' => ['App\Listeners\Transportation\SetDisplayId'],
        'App\Events\Transportation\Created' => ['App\Listeners\Transportation\Created'],
        'App\Events\Transportation\Saving' => ['App\Listeners\Transportation\Saving'],
        'App\Events\Vehicle\Saving2' => ['App\Listeners\Vehicle\Saving2']
    ];
    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        UserEventSubscriber::class,
        VehicleEventSubscriber::class,
        TrailerEventSubscriber::class,
        DriverEventSubscriber::class,
        BuildersRiskSubscriber::class,
        EquipmentSubscriber::class,
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
