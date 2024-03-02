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

      $query->where(function (Builder $q) use ($statuses): void {
         foreach ($statuses as $status) {
            $q->orWhere('status', $status);
         }
      });

      return FilterResultObj::create($request, $query);
   }
}
