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
      $from = $request->created_from;
      $to = $request->created_to;

      if ($from) {
         $date = Carbon::parse($from);

         $query->where('created_at', '>=', $date);
      }

      if ($to) {
         $date = Carbon::parse($to)
            ->setHours(23)
            ->setMinutes(59)
            ->setSeconds(59);

         $query->where('created_at', '<=', $date);
      }

      return FilterResultObj::create($request, $query);
   }
}
