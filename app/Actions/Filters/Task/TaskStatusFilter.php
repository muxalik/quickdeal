<?php

namespace App\Actions\Filters\Task;

use App\ValueObjects\FilterResultObj;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TaskStatusFilter
{
   public static function handle(
      Request $request,
      Builder $query
   ): FilterResultObj {
      $statuses = $request->statuses ?? [];

      if (is_string($statuses)) {
         $statuses = [];
      }

      if (!empty($statuses)) {
         $query->where(function (Builder $q) use ($statuses): void {
            $q->whereIn('status', $statuses);
         });
      }

      return FilterResultObj::create($request, $query);
   }
}
