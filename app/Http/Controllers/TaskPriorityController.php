<?php

namespace App\Http\Controllers;

use App\Enums\TaskPriorities;

class TaskPriorityController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): array
    {
        return TaskPriorities::localizedCases();
    }
}
