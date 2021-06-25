<?php

namespace App\Observers;

use App\Models\Task;
use App\Models\Activity;
use Illuminate\Support\Arr;


class TaskObserver
{
    /**
     * Handle the Task "created" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function created(Task $task)
    {
        $activity = $task->activity()->create([
            'project_id' =>$task->project->id,
            'user_id' => $task->project->owner_id,
            'description' => 'task_created'
        ]);
        
    }
//##################################
public function updating(Task $task)
{
    $task->old = $task->getOriginal();
}
//##################################
    /**
     * Handle the Task "updated" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function updated(Task $task)
    {
       // dd($task->old['completed']);
       // dd($task->getAttributes()['completed']);
        if( $task->old['completed'] == $task->getAttributes()['completed']  )
        {
            $task->activity()->create([
                'project_id' => $task->project->id,
                'user_id' => $task->project->owner_id,
                'description' =>'task_updated',
                'changes' => [
                    'before' =>  Arr::except(array_diff($task->old,$task->getAttributes()),['updated_at']),
                    'after' =>  Arr::except(array_diff($task->getAttributes(),$task->old),['updated_at'])
                ]
            ]);
        }

       
    }

    /**
     * Handle the Task "deleted" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function deleted(Task $task)
    {
        $task->activity()->create([
            'project_id' =>$task->project->id,
            'user_id' => $task->project->owner_id,
            'description' => 'task_deleted'
        ]);
    }

    /**
     * Handle the Task "restored" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function restored(Task $task)
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function forceDeleted(Task $task)
    {
        //
    }
}
