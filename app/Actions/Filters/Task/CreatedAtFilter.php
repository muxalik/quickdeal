<?php

namespace App\Actions\Filters\Task;

use App\ValueObjects\FilterResultObj;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CreatedAtFilter
{
   public static function handle(
      Request $request,
      Builder $query,
   ): FilterResultObj {
      $from = $request->updated_from;
      $to = $request->updated_to;

      if ($from) {
         $date = Carbon::parse($from);

         $query->where('updated_at', '>=', $date);
      }

      if ($to) {
         $date = Carbon::createFromFormat($to)
            ->setHours(23)
            ->setMinutes(59)
            ->setSeconds(59);

         $query->where('updated_at', '<=', $date);
      }

      return FilterResultObj::create($request, $query);
   }
}
