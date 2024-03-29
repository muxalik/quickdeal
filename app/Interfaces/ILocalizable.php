<?php

namespace App\Interfaces;

use App\ValueObjects\LocalizedObj;

interface ILocalizable 
{
   public function localize(): LocalizedObj;
   public static function localizedCases(): array;
}