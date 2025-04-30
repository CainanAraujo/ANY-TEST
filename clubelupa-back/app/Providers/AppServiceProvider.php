<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Registre quaisquer serviços ou vinculações adicionais.
     *
     * @return void
     */
    public function register(): void
    {
        // Exemplo: Vinculação de interfaces a implementações.
        // $this->app->bind(
        //     \App\Contracts\ExampleContract::class,
        //     \App\Services\ExampleService::class
        // );
    }

    /**
     * Bootstrap de quaisquer serviços da aplicação.
     *
     * @return void
     */
    public function boot(): void
    {
        // Ajuste para compatibilidade com versões antigas do MySQL.
        Schema::defaultStringLength(191);

        // Compartilhe dados com todas as views, se necessário.
        View::share('appName', config('app.name'));

        // Outras configurações de boot podem ser adicionadas aqui.
    }
}
