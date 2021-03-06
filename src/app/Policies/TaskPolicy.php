<?php

namespace App\Policies;

use App\Entities\User;
use App\Entities\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the task.
     *
     * @param  \App\Entities\User  $user
     * @param  \App\Entities\Task  $task
     * @return mixed
     */
    public function view(User $user, Task $task)
    {
        return true;
    }

    /**
     * Determine whether the user can create tasks.
     *
     * @param  \App\Entities\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id > 0;
    }

    /**
     * Determine whether the user can update the task.
     *
     * @param  \App\Entities\User  $user
     * @param  \App\Entities\Task  $task
     * @return mixed
     */
    public function update(User $user, Task $task)
    {
        return $user->id == $task->user_id;
    }

    /**
     * Determine whether the user can delete the task.
     *
     * @param  \App\Entities\User  $user
     * @param  \App\Entities\Task  $task
     * @return mixed
     */
    public function delete(User $user, Task $task)
    {
        return $user->id == $task->user_id;
    }
}
