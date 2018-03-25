<?php

namespace App\Policies;

use App\Entities\Task;
use App\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function destroy (User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }
}
