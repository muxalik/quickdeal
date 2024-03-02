<?php

namespace App\Filters;

use App\Actions\Filters\Task\TaskStatusFilter;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TaskFilter extends BaseFilter
{
   protected array $filters = [
      TaskStatusFilter::class,
   ];


   public function __construct(Request $request)
   {
      parent::__construct($request);

      $this->query = Task::query();
   }

   protected function search(): self
   {
      if (!$this->q) {
         return $this;
      }

      $this->query
         ->where(function (Builder $q): Builder {
            return $q
               ->where('id', 'LIKE', "%$this->q%")
               ->orWhere('title', 'LIKE', "%$this->q%")
               ->orWhere('content', 'LIKE', "%$this->q%")
               ->orWhere('status', 'LIKE', "%$this->q%")
               ->orWhere('priority', 'LIKE', "%$this->q%");
         });

      return $this;
   }

   protected function sort(): self
   {
      switch ($this->sort) {
         case 'id':
         case 'title':
         case 'content':
         case 'priority':
         case 'status':
         case 'createdAt':
         case 'updatedAt':
            $this->query->orderBy(
               str($this->sort)->snake(),
               $this->order->value
            );

            break;

         default:
            $this->query->latest('id');
      }

      return $this;
   }
}
