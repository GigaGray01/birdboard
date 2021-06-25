<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> My Project</title>
    <link rel="stylesheet" href="{{ asset('css/showcss.css') }}">
</head>
<body>
@include('auth.header2')
<main class="main-container">
<article>
    <div class="row1">
        <div>
            <a href="/projects" class="path">My Projects / {{$project->title }}</a>
            <!-- <a href="#" class="addTask">Add Task</a> -->
        </div>
        <div>
            @foreach ($project->members as $member )
                <img width="35" src="{{ gravatar_url($member->email) }}" alt="{{ $member->name }}'s Avatar" title="{{ $member->name }}'s Avatar">
            @endforeach
            <img width="35" src="{{ gravatar_url($project->owner->email) }}" alt="{{ $project->owner->name }}'s Avatar" title="{{ $project->owner->name }}'s Avatar">
            <a href="{{ $project->path().'/edit' }}" class="editProject">Edit Project</a>
        
        </div>
    </div>
    <div class="row2">
<!-- ################################## Tasks #################################################### -->
        <div class="col1">
            <div class="tasks">
                <h4>Tasks</h4>
                @foreach ( $project->tasks as $task )
                    <form action="{{ $project->path().'/tasks/'.$task->id }}" method="post">
                        @method('patch')
                        @csrf
                        <input type="text" value = "{{ $task->body }}" name="body" id="body">
                        <input type="checkbox" name="completed" onchange= "this.form.submit()" {{ $task->completed ? 'checked':''}} >
                    </form>
                @endforeach
                    <form action="{{ $project->path().'/tasks' }}" method="post">
                        @csrf
                        <input type="text" name="body" id="body" placeholder = "Add task ..">
                    </form>
                    @include('errors')

            </div>
<!-- ##################################### Notes ################################################# -->
            <div class="notes">
                <div><h4>Notes</h4></div>
                <form action="{{ $project->path() }}" method="post">
                    @method('patch')
                    @csrf
                    
                    <textarea name="notes" id="notes" cols="30" rows="8" placeholder="add note ..">{{ $project->notes}}</textarea>
                    <input type="submit" value="save">
                </form>
            </div> 
            <div class="footer"><a href="/projects" class="back">Back</a></div>
        </div>
        <div class="col2">
<!-- ################################ project card ############################################################ -->
           @include('projects.card')
<!-- ################################ invitation card ############################################################ -->
            @can('manage',$project)
                @include('projects.invite') 
            @endcan
    </div>
</article>
<!-- ##################################### Activity ################################################# -->
<aside>
    <div>
        <h4>Activity Feed</h4>
        
        @foreach ($project->activity as $activity )
        <ul>
           <li> @include("projects.activity.{$activity->description}")</li>
           <span style="color:gray">{{ $activity->created_at->diffForHumans(null,true)}}</span>
        </ul>
        @endforeach
    </div>
</aside>
    
</main>   

</body>
</html>