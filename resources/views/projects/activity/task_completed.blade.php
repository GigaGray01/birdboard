@if (Auth::user()->id == $activity->user->id)
    You completed a task
@else
    {{$activity->user->name}} completed a task
@endif