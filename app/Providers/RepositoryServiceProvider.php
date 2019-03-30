<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\DatabaseManager;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $db = $this->app->make(DatabaseManager::class);

        $this->app->singleton(UserRepositoryInterface::class, function () use ($db) {
            return new UserRepository(new User(), $db);
        });
    }
}
