<style>
        @font-face {
        font-family: "RobotoSlab-Regular";
        font-weight: 500;
        src: url({{url('/myFonts/static/RobotoSlab-Regular.ttf')}});
        }
        
     body
        {
            font-family:"RobotoSlab-Regular";
            background-color: rgb(250, 248, 248);
            font-size :16px;

            width: 100%;
            margin: 0px auto;
        }
     
        
        form
        {
            width: 100%;
        }
        
        input[type="text"],textarea
        {
            border :1px solid rgb(223, 222, 222);
            border-radius: 3px;
            margin: 8px 0 1em 0;
            padding: 13px;
            width: 100%;
        }
        
        a{
            color: rgb(160, 158, 158);
        }
        
        .submit
        {
            background-color: #47cdff;
            border: 1px solid #47cdff;
            border-radius: 5px;
            width: 115px;
            padding: 7px;
            color: white;
            font-weight: bold;
            margin-right: 10px;
        }

</style>
    <form action="{{$project->path()}}" method="post">
        @csrf
        <div>
            <label for="title">Title:</label>
            <br>
            <input type="text" name="title" id="title" value="{{ $project->title }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <br>
            <textarea name="description" id="" cols="30" rows="10" required>{{ $project->description }}</textarea>
        </div>
        <div>
            <input type="submit" value="{{ $buttontext }}" class="submit">
            <a href="{{$project->path()}}">cancle</a>
        </div>
    </form> 
    
@if($errors->any())
    <div>
        @foreach ( $errors->all() as $error )
            <li style="color:red">{{ $error }}</li>
        @endforeach
    </div>
@endif
   