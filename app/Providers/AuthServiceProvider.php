<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Policies\AccessPekerjaan;
use App\Policies\AccessPendidikan;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Pekerjaan::class => AccessPekerjaan::class,
        Pendidikan::class => AccessPendidikan::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
