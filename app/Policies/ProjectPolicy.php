<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Project;


class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function manage(User $user, Project $project)
    {
        return  $user->is($project->owner) ;
        
    }
    public function update(User $user, Project $project)
    {
       // return $user->id === $Project->owner_id;
        return  $user->is($project->owner) || $project->members->contains($user);
        // 
    }
    public function delete(User $user, Project $project)
    {
        return  $user->is($project->owner);
    }
}
