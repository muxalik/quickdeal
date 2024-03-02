<?php

use App\Enums\TaskPriorities;

return [
   TaskPriorities::DoFirst->value => 'Сделать в первую очередь',
   TaskPriorities::Schedule->value => 'Отложить',
   TaskPriorities::Delegate->value => 'Делегировать',
   TaskPriorities::DontDo->value => 'Не делать',
];
