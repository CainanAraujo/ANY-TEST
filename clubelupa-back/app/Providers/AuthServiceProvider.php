<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * As mapeamentos de políticas para modelos da aplicação.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Registra os serviços de autenticação / autorização.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
