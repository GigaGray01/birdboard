@if (Auth::user()->id == $activity->user->id)
    You created a project
@else
    {{$activity->user->name}} created a project
@endif