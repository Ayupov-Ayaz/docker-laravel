<?php
/**
 * Created by PhpStorm.
 * User: tommy
 * Date: 25.03.18
 * Time: 16:02
 */

namespace App\Repositories;


use App\Entities\User;

class TaskRepository
{
    /**
     * Получить все задачи пользователя
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function forUser(User $user)
    {
        return $user->tasks()
            ->orderBy('created_at', 'asc')
            ->get();
    }
}