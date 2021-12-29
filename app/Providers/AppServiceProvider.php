<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\PrescriptionRepositoryInterface',
            'App\Repositories\Eloquent\PrescriptionRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\Contracts\ClinicRepositoryInterface',
            'App\Repositories\Http\ClinicRepositoryHttp'
        );
        $this->app->bind(
            'App\Repositories\Contracts\PatientRepositoryInterface',
            'App\Repositories\Http\PatientRepositoryHttp'
        );
        $this->app->bind(
            'App\Repositories\Contracts\PhysicianRepositoryInterface',
            'App\Repositories\Http\PhysicianRepositoryHttp'
        );
        $this->app->bind(
            'App\Repositories\Contracts\MetricRepositoryInterface',
            'App\Repositories\Http\MetricRepositoryHttp'
        );
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
