<?php

namespace App\Models;

use App\Enums\TaskPriorities;
use App\Enums\TaskStatuses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'priority',
        'status',
    ];

    protected $casts = [
        'priority' => TaskPriorities::class,
        'status' => TaskStatuses::class,
    ];

    public function getLocalizedPriorityAttribute(): string
    {
        return $this->priority->localize()->locale;
    }

    public function getLocalizedStatusAttribute(): string
    {
        return $this->status->localize()->locale;
    }
}
