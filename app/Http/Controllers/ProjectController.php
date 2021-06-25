<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProjectRequest;


class ProjectController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $projects = Project::all();
        $projects = auth()->user()->accessableProject();
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required',
            'description' => 'sometimes|required|max:100',
            'notes' => 'max:255',
        ]);
        
       $project = auth()->user()->projects()->create($validated); 

        return redirect($project->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //if(auth()->id() != $project->owner_id)//this or the below one
        //  if(auth()->user()->isNot($project->owner))
        //  {
        //      abort(403,'You Are Not Allowed To Views This project!');
        //  }
        $this->authorize('update',$project);
         return view('projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->authorize('update',$project);

         $validated = $request->validate([
            'title' => 'sometimes|required',
            'description' => 'sometimes|required|max:100',
            'notes' => 'max:255',
        ]);
       
        $project->update($validated);
        
        return redirect ($project->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete',$project);

        $project->delete();
        return redirect('/projects');
    }
}
