<?php

namespace App\ValueObjects;

class LocalizedObj
{
   public function __construct(
      public readonly string $value,
      public readonly string $locale,
   ) {
   }
}
