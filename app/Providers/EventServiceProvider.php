<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        // Define your event listeners here
        // Example:
        // 'App\Events\SomeEvent' => [
        //     'App\Listeners\SomeEventListener',
        // ],
    ];

    public function boot()
    {
        parent::boot();
        // Other boot logic if needed
    }
}
