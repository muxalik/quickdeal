<?php

namespace App\ValueObjects;

class LocalizedObj
{
   public function __construct(
      public readonly string $value,
      public readonly string $locale,
   ) {
   }

   public function toArray(): array
   {
      return [
         'value' => $this->value,
         'locale' => $this->locale,
      ];
   }
}
