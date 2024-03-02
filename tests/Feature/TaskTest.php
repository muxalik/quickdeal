<?php

namespace Tests\Feature;

use App\Enums\TaskPriorities;
use App\Enums\TaskStatuses;
use App\Models\Task;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use DatabaseTransactions;

    public function test_it_can_be_listed(): void
    {
        $response = $this->get(route('tasks.index'));

        $response->assertOk();
    }

    public function test_it_can_be_created(): void
    {
        $data = [
            'title' => fake()->text(mt_rand(5, 30)),
            'content' => fake()->text(100),
            'priority' => TaskPriorities::DoFirst->value,
        ];

        $response = $this->postJson(route('tasks.store'), $data);

        $response->assertCreated();

        $this->assertDatabaseHas('tasks', $data);
    }

    public function test_it_can_be_updated(): void
    {
        $data = [
            'title' => fake()->text(mt_rand(5, 30)),
            'content' => fake()->text(100),
            'priority' => TaskPriorities::DoFirst->value,
            'status' => TaskStatuses::InProcess->value,
        ];

        $task = Task::factory()->create($data);

        $response = $this->patchJson(
            route('tasks.update', compact('task')),
            $data
        );

        $response->assertOk();

        $this->assertDatabaseHas('tasks', $data);
    }

    public function test_it_can_be_deleted(): void
    {
        $task = Task::factory()->create();

        $response = $this->delete(
            route('tasks.update', compact('task')),
        );

        $response->assertNoContent();

        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }

    public function test_it_can_be_filtered_by_date(): void
    {
        Task::factory(10)->create();

        $createdFrom = now()->subDays(2)->toDateTimeString();
        $createdTo = now()->subDays(1)->toDateTimeString();

        $response = $this->getJson(route('tasks.index', [
            'created_from' => $createdFrom,
            'created_to' => $createdTo,
        ]));

        $response->assertOk();

        $filteredTasksCount = Task::query()
            ->where('created_at', '>=', $createdFrom)
            ->where('created_at', '<=', $createdTo)
            ->count();

        $actual = $response->json('meta.total');

        $this->assertSame($filteredTasksCount, $actual);
    }

    public function test_it_can_be_filtered_by_status(): void
    {
        Task::factory(10)->create();

        $statuses = [
            TaskStatuses::NotStarted->value,
            TaskStatuses::InProcess->value,
        ];

        $response = $this->getJson(
            route('tasks.index', compact('statuses'))
        );

        $response->assertOk();

        $filteredTasksCount = Task::query()
            ->whereIn('status', $statuses)
            ->count();

        $actual = $response->json('meta.total');

        $this->assertSame($filteredTasksCount, $actual);
    }
}
