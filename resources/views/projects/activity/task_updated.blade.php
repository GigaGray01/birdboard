@if (Auth::user()->id == $activity->user->id)
    You updated a task
@else
    {{$activity->user->name}} updated a task
@endif