<?php

use App\Enums\TaskStatuses;

return [
   TaskStatuses::NotStarted->value => 'Не начато',
   TaskStatuses::InProcess->value => 'Выполняется',
   TaskStatuses::Completed->value => 'Выполнено',
];
