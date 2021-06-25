@if ($errors->{ $bag ?? 'default' }->any())
    <div>
        @foreach ($errors->{ $bag ?? 'default' }->all() as $error)
            <ul style="list-style:none">
                <li style="color:red">{{ $error }}</li>
            </ul>
        @endforeach
    </div>
@endif

