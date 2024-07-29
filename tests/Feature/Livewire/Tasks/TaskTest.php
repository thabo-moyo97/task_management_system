<?php

namespace Tests\Feature\Livewire\Tasks;

use App\Livewire\Tasks\Task;
use App\Models\User;
use App\TaskStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        Livewire::actingAs($this->user);
    }

    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Task::class)
            ->assertStatus(200);
    }

    /** @test */
    public function it_can_render_the_task_component()
    {
        $task = \App\Models\Task::factory()->create();

        Livewire::test('tasks.task', ['task' => $task])
            ->assertSee($task->title)
            ->assertSee($task->status)
            ->assertSee($task->user->name);
    }

    /** @test */
    public function it_can_edit_a_task()
    {
        $task = \App\Models\Task::factory()->create();

        Livewire::test('tasks.edit-task', ['task' => $task])
            ->set('title', 'Updated Task')
            ->call('saveTask')
            ->assertRedirect('/tasks');

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'title' => 'Updated Task',
        ]);
    }

    /** @test */
    public function it_can_delete_a_task()
    {
        $task = \App\Models\Task::factory()->create();

        Livewire::test('tasks.task', ['task' => $task])
            ->call('deleteTask', $task->id)
            ->assertRedirect('/');

        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }

    /** @test */
    public function it_can_add_a_task()
    {
        Livewire::test('tasks.add-task')
            ->set('title', 'New Task')
            ->set('description', 'New description')
            ->set('status', TaskStatus::CANCELLED)
            ->call('saveTask')
            ->assertRedirect('/tasks');

        $this->assertDatabaseHas('tasks', [
            'title' => 'New Task',
            'status' => TaskStatus::CANCELLED,
            'user_id' => $this->user->id,
        ]);
    }
}
