<?php

namespace App\Enums;

use App\Interfaces\IEnumerable;
use App\Interfaces\ILocalizable;
use App\Traits\Enumerable;
use App\Traits\Localizable;

enum TaskPriorities: string implements IEnumerable, ILocalizable
{
   use Enumerable, Localizable;

   case DoFirst = 'do_first';
   case Schedule = 'schedule';
   case Delegate = 'delegate';
   case DontDo = 'dont_do';
}
