<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatuses;

class TaskStatusController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): array
    {
        return TaskStatuses::localizedCases();
    }
}
