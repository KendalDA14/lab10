<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    public function autorized(User $user, Task $task): bool
    {
        return $task->user->is($user);
    }
}
