@if (Auth::user()->id == $activity->user->id)
    You incompleted a task
@else
    {{$activity->user->name}} incompleted a task
@endif