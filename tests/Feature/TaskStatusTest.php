<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskStatusTest extends TestCase
{
    use DatabaseTransactions;

    public function test_it_can_be_listed(): void
    {
        $response = $this->get(route('task.status'));

        $response->assertOk();

        $response->assertJsonStructure([['value', 'locale']]);
    }
}
