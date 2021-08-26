<?php

namespace App\Providers;

use App\Repositories\EmployeeRepositories\EmployeeRepository;
use App\Repositories\EmployeeRepositories\InterfaceEmployeeRepository;
use App\Repositories\GroupRepositories\GroupRepository;
use App\Repositories\GroupRepositories\InterfaceGroupRepository;
use App\Repositories\TeamRepositories\InterfaceTeamRepository;
use App\Repositories\TeamRepositories\TeamRepository;
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
        $this->app->singleton(
            InterfaceGroupRepository::class,
            GroupRepository::class,

        );
        $this->app->singleton(
            InterfaceTeamRepository::class,
            TeamRepository::class,
        );
        $this->app->singleton(
            InterfaceEmployeeRepository::class,
            EmployeeRepository::class
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