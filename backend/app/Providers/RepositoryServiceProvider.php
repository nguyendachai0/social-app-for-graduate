<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ProfileUser\ProfileUserRepositoryInterface;
use App\Repositories\ProfileUser\ProfileUserRepository;
use App\Services\ProfileUser\ProfileUserServiceInterface;
use App\Services\ProfileUser\ProfileUserService;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProfileUserRepositoryInterface::class, ProfileUserRepository::class);
        $this->app->bind(ProfileUserServiceInterface::class, ProfileUserService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
