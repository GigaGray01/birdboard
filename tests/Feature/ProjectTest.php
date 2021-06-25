<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Session\TokenMismatchException;
use Tests\TestCase;
use App\Models\Project;
use App\Models\User;


class ProjectTest extends TestCase
{
    use WithFaker ;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_create_project()
    {
       // $this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $this->actingAs(User::factory()->create());

        $this->get('/projects/create')->assertStatus(200);

        $attributes = [
            'title' => 'my title',
            'description' => $this->faker->sentence(),
            'owner_id' => auth()->id(),
            'notes' => 'new notes'
        ];

        $this->post('/projects',$attributes);


       // $this->assertDatabaseHas('projects',$attributes);
        $this->get('/projects')->assertSee($attributes['title']);
    }
    public function test_user_can_delete_project()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $this->actingAs(User::factory()->create());
        $project = Project::factory()->create(['owner_id' => auth()->id()]);
        $this->assertDatabaseHas('projects',$project->toArray());
        $this->delete($project->path());
        $this->assertDatabaseMissing('projects',$project->toArray());

    }
    public function test_unauthorize_user_can_not_delete_project()
    {
       // $this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);


        $project = Project::factory()->create(['title' => 'deletiiiing']);
        $this->delete($project->path())
            ->assertRedirect('/login');

        $this->actingAs($user=User::factory()->create());

        $this->delete($project->path())
            ->assertStatus(403);

        $project->invite($user);

        $this->actingAs($user)->delete($project->path())
            ->assertStatus(403);
    }
    public function test_project_requires_title()
    {
       // $this->withoutExceptionHandling();
       $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $this->actingAs(User::factory()->create());
        $attributes = Project::factory()->raw(['title' => '']);//raw()will attribute and store it as an ARRAY Not an OBJECT (like when i used make() fun)
        $this->post('/projects',$attributes)
            ->assertSessionHasErrors('title');
    }

    public function test_project_requires_description()
    {
       // $this->withoutExceptionHandling();
       $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

       
       $this->actingAs(User::factory()->create());
       $attributes = Project::factory()->raw(['description' => '']);
        $this->post('/projects',$attributes)
            ->assertSessionHasErrors('description');
    }

    public function test_a_auth_user_can_view_their_project()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $this->actingAs(User::factory()->create());

        $project = Project::factory()->create(['owner_id' => auth()->id()]);
        $response = $this->get($project->path());
        $response->assertSee($project->title);
    }
    public function test_a_user_can_view_the_projects_she_invited_to()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $this->actingAs($user=User::factory()->create());

        $project = Project::factory()->create();
        $project->invite($user);
        $this->get('/projects')
              ->assertSee($project->title);
    }

    public function test_a_auth_user_can_not_view_others_projects()
    {
        //$this->withoutExceptionHandling();

        $this->actingAs(User::factory()->create());

        $project = Project::factory()->create();
    
        $this->get($project->path())->assertStatus(403);
    }

    public function test_a_auth_user_can_not_update_others_notes()
    {
        //$this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $this->actingAs(User::factory()->create());

        $project = Project::factory()->create();
        $response = $this->patch($project->path(),[]);
        $response->assertStatus(403);
    }

    public function test_auth_user_can_update_project()
    {
       //$this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $this->actingAs(User::factory()->create());

        $project = Project::factory()->create(['owner_id' => auth()->id()]);

        $this->patch($project->path(),$attributes=['title'=>'changed','description'=>'changed','notes' => 'changed']);
        $this->get($project->path().'/edit')->assertStatus(200);
        $this->assertDatabaseHas('projects' ,$attributes); 
    }

    public function test_guest_can_not_manage_project()
    {
        //$this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $project = Project::factory()->create();

         $this->get('/projects')->assertRedirect('/login');//canNot show All projects(index)
         $this->get($project->path())->assertRedirect('/login');//canNot show specific proj(show)
         $this->get($project->path().'/edit')->assertRedirect('/login');//canNot edit specific proj(edit)
         $this->patch($project->path())->assertRedirect('/login');//canNot updat specific proj(update)
         $this->post('/projects',$project->toArray())->assertRedirect('/login');//canNot store new proj(store)
         $this->get('/projects/create')->assertRedirect('/login');//canNot view create form(create)
        $this->delete($project->path())->assertRedirect('/login');//canNot delete specific proj(delete)

    }

    
}
