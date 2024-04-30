<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
    $this->registerPolicies();

    Gate::define('create-conference', function ($user) {
        return $user->isAdmin(); // Assuming you have an 'isAdmin' method on your User model
    });
    Gate::define('edit-conference', function ($user) {
        return $user->isAdmin(); // Assuming you have an 'isAdmin' method on your User model
    });
}
}
