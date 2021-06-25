<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Project;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Project $project)
    {
        $this->authorize('update',$project);
        $validated = $request->validate([
            'body' => 'required',
        ]);
        
        $project->addTask($validated['body']);
        return redirect($project->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Project $project,Task $task)
    {
        $this->authorize('update',$project);
        $task->update(request()->validate(['body' => 'required']));

        // $task->update([
        //     'body' => request('body'),
        //     //'completed' => request()->has('completed')
        // ]);//i do that for "completed" cuz if ckbox was not checked it will not send in the request so i do check, if the request has "complted" field
        
        if(request('completed'))
         {
            $task->complete();
         }
        else
        {
            $task->incomplete();
        }
        // elseif ( (! request('completed')) && ($task->old['completed'] != $task->getAttributes()['completed']) ) 
        //  {
        //     $task->incomplete();
        //  }
        return redirect($project->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
