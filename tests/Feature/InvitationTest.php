<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Project;
use App\Models\User;

class InvitationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_project_owner_can_invite_a_user()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

       // $this->actingAs(User::factory()->create());
       $project = Project::factory()->create();
       $invitedUser=User::factory()->create();
       $this->actingAs($project->owner)->post($project->path().'/invite',['email'=>$invitedUser->email]);
       
       $this->assertTrue($project->members->contains($invitedUser));

    }
    public function test_invited_user_can_update_project()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

       // $this->actingAs(User::factory()->create());
       $project = Project::factory()->create();
       $project->invite($newUser=User::factory()->create());
       
       $this->actingAs($newUser);
       $this->post($project->path().'/tasks',$task=['body'=>'test invite']);
       $this->assertDatabaseHas('tasks',$task);

    }
    public function test_invited_email_must_be_associated_with_vaild_birdboard_account()
    {
        //$this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

       $project = Project::factory()->create();
       $invitedUser=User::factory()->create();
       $this->actingAs($project->owner)->post($project->path().'/invite',['email'=>'a@gmail.com'])
       ->assertSessionHasErrors(['email'=>'email owner should has account in birdboard first !']);
      // ->assertSessionHasErrors(['email'=>'email owner should has account in birdboard first !'],null,'invitaion);//i should add the errorBag name

       
    }
    public function test_only_project_owner_can_invite_other_users()
    {
       // $this->withoutExceptionHandling();
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

       $project = Project::factory()->create();
       $newUser=User::factory()->create();
       $assertInvitaionForebidden = function () use ($newUser,$project){
        $this->actingAs($newUser)
        ->post($project->path().'/invite')
        ->assertStatus(403);
       };
       $assertInvitaionForebidden();
       $project->invite($newUser);
       $assertInvitaionForebidden();



    }
}
