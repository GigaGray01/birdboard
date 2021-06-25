
@if (Auth::user()->id == $activity->user->id)
    @if ( count($activity->changes['after'])  == 1 )
        You updated {{ key($activity->changes['after']) }} of the project 
    @else
        You  updated the project
    @endif
@else
    @if ( count($activity->changes['after'])  == 1 )
    {{$activity->user->name}} updated {{ key($activity->changes['after']) }} of the project 
    @else
        {{$activity->user->name}} updated the project
    @endif
@endif

