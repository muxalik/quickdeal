<?php

namespace App\Enums;

use App\Interfaces\IEnumerable;
use App\Interfaces\ILocalizable;
use App\Traits\Enumerable;
use App\Traits\Localizable;

enum TaskStatuses: string implements IEnumerable, ILocalizable
{
   use Localizable, Enumerable;

   case NotStarted = 'not_started';
   case InProcess = 'in_process';
   case Completed = 'completed';
}
