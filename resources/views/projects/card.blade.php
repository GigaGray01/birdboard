<style>
        .card
        {
            border: 1px solid white;
            border-radius: 5px;
            background-color: white;
            margin: 8px;
            padding: 10px;
            height: 150px;
            width: 260px;
            display: flex;
            flex-direction:column;
        }
        .card h3 a,.card h4
        {
            border-left: 3px solid #47cdff;
            margin-left: -12px;
            padding: 2px;
            text-decoration: none;
            color: black;
        }
        
        .card  input[type="submit"]{
            background-color: #47cdff;
            border: 1px solid #47cdff;
            border-radius: 5px;
            width: 70px;
            padding: 2px;
            color: white;
        }
        .delete-form{
            align-self: flex-end;
            margin-top: 40px;
        }
</style>
    <div class="card">
        <h3><a href="{{$project->path()}}">{{$project -> title}}</a></h3>
        <div>{{ \Illuminate\Support\Str::limit($project->description, 25) }}</div>
        @can('manage',$project)
            <div class="delete-form">
                <form action="{{ $project->path() }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Delete">
                </form>
            </div>
        @endcan
    </div>
  