@if (Auth::user()->id == $activity->user->id)
    You created a task
@else
    {{$activity->user->name}} created a task
@endif