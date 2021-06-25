<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Project;
use App\Models\User;
use App\Models\Task;


class TaskTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_auth_user_can_add_task_to_projects()
    {
        //$this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $this->actingAs(User::factory()->create());

        $project = Project::factory()->create(['owner_id' =>auth()->id()]);
        $this->post($project->path().'/tasks',['body' => 'boddy Test']);
        $this->get($project->path())->assertSee('boddy Test');
    }

    public function test_task_requires_body()
    {
        //$this->withoutExceptionHandling();
       $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

       $this->actingAs(User::factory()->create());

       $project = Project::factory()->create();
       $attributes = Task::factory()->raw(['project_id' => $project->id ,'body' => '']);

       $this->actingAs($project->owner)
             ->post($project->path() . '/tasks', $attributes)
            ->assertSessionHasErrors('body');

    //    $this->post($project->path().'/tasks',$attributes)
    //         ->assertSessionHasErrors('body');

    }

    public function test_only_project_owner_can_add_task()
    {
        //$this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $this->actingAs(User::factory()->create());

        $project = Project::factory()->create();

        $this->post($project->path().'/tasks',['body' => 'boddy'])
            ->assertStatus(403);
        $this->assertDatabaseMissing('tasks' , ['body' => 'boddy']);
    }

    public function test_task_can_be_updated()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $this->actingAs(User::factory()->create());

        $project = Project::factory()->create(['owner_id' => auth()->id()]);

        $task = $project->addTask("TestBody");
        $this->patch($project->path().'/tasks/'.$task->id,[
            'body' => 'changed',
        ]);
        $this->assertDatabaseHas('tasks' ,[
            'body' => 'changed',
        ]); 
    }
    public function test_task_can_be_completed()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $this->actingAs(User::factory()->create());

        $project = Project::factory()->create(['owner_id' => auth()->id()]);

        $task = $project->addTask("TestBody");
        $this->patch($project->path().'/tasks/'.$task->id,[
            'body' => 'changed',
            'completed' => true
        ]);
        $this->assertDatabaseHas('tasks' ,[
            'body' => 'changed',
            'completed' => true
        ]); 
    }
    public function test_task_can_marks_as_incompleted()
    {
     //   $this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $this->actingAs(User::factory()->create());

        $project = Project::factory()->create(['title'=>'www','owner_id' => auth()->id()]);

        $task = $project->addTask("TestBody");
        $this->patch($project->path().'/tasks/'.$task->id,[
            'body' => 'changedddd',
            'completed' => true
        ]);
        $this->patch($project->path().'/tasks/'.$task->id,[
            'body' => 'changedddd',
            'completed' => false
        ]);
        $this->assertDatabaseHas('tasks' ,[
            'body' => 'changedddd',
            'completed' => false
        ]); 
    }

    public function test_only_the_project_owner_can_update_task()
    {
       // $this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $this->actingAs(User::factory()->create());

        $project = Project::factory()->create();

        $task = $project->addTask("BODY");

        $this->patch($project->path().'/tasks/'.$task->id,['body' => 'new body',])
            ->assertStatus(403);

        $this->assertDatabaseMissing('tasks' ,['body' => 'new body',]); 


        
    }
}
