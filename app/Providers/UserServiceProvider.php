<?php

namespace App\Providers;

use App\User;
use App\User\DoctrineUserRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Illuminate\Support\ServiceProvider;
use App\User\UserRepository;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class, function($app) {
            return new DoctrineUserRepository(
                $app['em'],
                new ClassMetadata(User::class)
            );
        });
    }
}
