<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Activity;
use Illuminate\Support\Arr;



class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function created(Project $project)
    {
        Activity::create([
            'project_id' => $project->id,
            'user_id' => $project->owner_id,
            'description' =>'created_project' 
            
        ]);
    }
//##################################
    public function updating(Project $project)
    {
        $project->old = $project->getOriginal();
    }
//##################################

    /**
     * Handle the Project "updated" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function updated(Project $project) 
    {
       // var_dump(array_diff($project->old,$project->getAttributes()));
        Activity::create([
            'project_id' => $project->id,
            'user_id' => $project->owner_id,
            'description' =>'updated_project',
            'changes' => [
                'before' => Arr::except(array_diff($project->old,$project->getAttributes()),['updated_at']),
                'after' => Arr::except(array_diff($project->getAttributes(),$project->old),['updated_at'])
            ]
        ]);
    }

    /**
     * Handle the Project "deleted" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function deleted(Project $project)
    {
        //
    }

    /**
     * Handle the Project "restored" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function restored(Project $project)
    {
        //
    }

    /**
     * Handle the Project "force deleted" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function forceDeleted(Project $project)
    {
        //
    }
}
