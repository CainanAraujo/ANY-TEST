<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define o caminho para a rota "home" da aplicação.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Registra as rotas da aplicação.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // Rotas de API: prefixo "api" e middleware "api"
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Rotas Web: sem prefixo, utilizando o middleware "web"
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configura o rate limiting (limitação de requisições) para a API.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(
                $request->user()?->id ?: $request->ip()
            );
        });
    }
}
