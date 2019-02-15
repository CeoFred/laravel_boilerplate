<?php

namespace App\Http\Controllers;

use App\Task;

class TaskControllr extends Controller
{
    public function show(Task $task){ // Task::find($task)
        return $task;
    }
}
