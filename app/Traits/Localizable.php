<?php

namespace App\Traits;

use App\ValueObjects\LocalizedObj;

trait Localizable
{
   public function localize(): LocalizedObj
   {
      $filename = str(__CLASS__)->afterLast('\\')->snake();
      $value = $this->value;

      return new LocalizedObj(
         value: $value,
         locale: __("$filename.$value"),
      );
   }
}
