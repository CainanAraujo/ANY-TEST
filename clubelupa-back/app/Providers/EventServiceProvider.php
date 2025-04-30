<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Os mapeamentos de eventos e seus respectivos listeners.
     *
     * @var array
     */
    protected $listen = [
        // 'App\Events\SomeEvent' => [
        //     'App\Listeners\SomeListener',
        // ],
    ];

    /**
     * Registra quaisquer eventos para a aplicação.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
