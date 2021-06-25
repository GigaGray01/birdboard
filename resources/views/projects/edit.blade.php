<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <style>
    @font-face {
        font-family: "RobotoSlab-Regular";
        font-weight: 500;
        src: url({{url('/myFonts/static/RobotoSlab-Regular.ttf')}});
        }
        body{
        font-family: "RobotoSlab-Regular";
        }
        h3
        {
            text-align: center;
        }
        .container-box
        {
            width: 60%;
            background-color: white;
            padding: 50px;
            border: 2px solid white;
            border-radius: 11px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;


        }
        .container-box div{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <main class="container-box">
        <h3>Edit Your Project</h3>
        <div>
            <form action="{{$project->path()}}" method="post">
                @method('patch')
                @csrf
                @include('projects.form',[
                    'buttontext' => 'Edit Project'
                ])
            </form>  
        </div>
    </main>

</body>
</html>