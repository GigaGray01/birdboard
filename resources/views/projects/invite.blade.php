
<div class="card">
    <div><h4>invite  user</h4></div>

    <div class="invite-form">
        <form action="{{$project->path().'/invite' }}" method="post">
            @csrf
            <input type="email" name="email" id="email">
            <input type="submit" value="invite">
        </form>

        @if (session('msg'))
            <div class="session-data">
                <ul style="list-style:none">
                    <li style="color:red">{{ session('msg') }}</li>
                </ul>
            </div>
        @endif

        @include('errors',['bag'=>'invitation'])

    </div>
</div>