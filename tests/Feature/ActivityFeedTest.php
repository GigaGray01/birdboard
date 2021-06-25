<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Project;
use App\Models\User;
use App\Models\Task;


class ActivityFeedTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_creating_project_generates_activity()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
        $this->actingAs(User::factory()->create());
        $project = Project::factory()->create(['title'=>'testing Activity']);
        
        $this->assertCount(1,$project->activity);
        $this->assertEquals('created_project' ,$project->activity[0]->description);
    }
    public function test_updating_project_generates_activity()
    {
       // $this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
        $this->actingAs(User::factory()->create());
        $project = Project::factory()->create(['title'=>'test updating Activity']);
        $project->update(['title' => 'updated']);
        
        $this->assertCount(2,$project->activity);
        $this->assertEquals('updated_project' ,$project->activity->last()->description);

        $expected =[
            'before' => ['title' => 'test updating Activity' ],
            'after' => ['title' => 'updated']
        ];
       // var_dump($project->activity->last()->changes);
        $this->assertEquals($expected,$project->activity->last()->changes);
    }
    public function test_creating_task_generates_activity()
    {
        //$this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
        $this->actingAs(User::factory()->create());
        $project = Project::factory()->create(['title'=>'testing Activity']);
        $project->addTask('Body For activity Test');
        
        $this->assertCount(2,$project->activity);
        $t = Task::find($project->activity->last()->subject_id);
       // dd($t->body);*
        $this->assertEquals('task_created',$project->activity->last()->description);
       // $this->assertInstanceOf(Task::class,$project->activity->last()->subject_type);
        $this->assertEquals('Body For activity Test',$t->body);
    }
    public function test_completing_task_generates_activity()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
        
        $this->actingAs(User::factory()->create());
        $project = Project::factory()->create(['owner_id'=>auth()->id(),'title'=>'testing Activityyy']);
        $task = Task::factory()->create(['project_id'=>$project->id]);

        $this->patch($task->path(),[
            'body' => 'update T body',
            'completed' => true
        ]);
        
        $this->assertCount(4,$project->activity);//i think it should be 4(create proj/create Task/#UPDATE TASK#/complete Task)
        $this->assertEquals('task_completed' ,$project->activity->last()->description);
    }
    public function test_incompleting_task_generates_activity()
    {
      //  $this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $this->actingAs(User::factory()->create());
        $project = Project::factory()->create(['owner_id'=>auth()->id(),'title'=>'testing Activityyy']);
        $task = Task::factory()->create(['project_id'=>$project->id]);

        $this->patch($task->path(),[
            'body' => 'update T body',
            'completed' => true
        ]);
        $this->assertCount(4,$project->activity);

        $this->patch($task->path(),[
            'body' => 'update T body',
            'completed' => false
        ]);
        
        $project->refresh();

        $this->assertCount(5,$project->activity);
        $this->assertEquals('task_incompleted' ,$project->activity->last()->description);

    }
    public function test_deleting_task_generates_activity()
    {
      //  $this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $this->actingAs(User::factory()->create());
        $project = Project::factory()->create(['owner_id'=>auth()->id(),'title'=>'testing Activityyy']);
        $task = Task::factory()->create(['project_id'=>$project->id]);

        $task->delete();
        
        $this->assertCount(3,$project->activity);
        $this->assertEquals('task_deleted' ,$project->activity->last()->description);
    }
}
