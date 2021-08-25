<?php

namespace App\Providers;

use App\Repositories\GroupRepositories\GroupRepository;
use App\Repositories\GroupRepositories\InterfaceGroupRepository;
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
        $this->app->singleton(InterfaceGroupRepository::class, GroupRepository::class);
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