<?php

namespace App\Providers;

use App\Entities\Task;
use App\Entities\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Task'  => 'App\Policies\TaskPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Определяет была ли создана задача данным пользователем
        Gate::define('is-your-task', function (User $user, Task $task) {

            return $user->id === $task->user_id;
        });
    }
}
