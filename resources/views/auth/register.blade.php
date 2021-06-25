<head>
<style>
    
    @font-face {
  font-family:"RobotoSlab-Regular";
  src: url("storage/myFonts/static/RobotoSlab-Regular");
  font-weight: 400;
}
    body
        {
            font-family:"RobotoSlab-Regular", Helvetica, sans-serif;
            background-color: rgb(250, 248, 248);
            font-size :16px;

            width: 100%;
            margin: 0px auto;
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
        form
        {
            width: 100%;
        }
        
        input[type="email"],input[type="password"],input[type="text"]
        {
            border :1px solid rgb(223, 222, 222);
            border-radius: 3px;
            margin: 8px 0 1em 0;
            padding: 7px;
            width: 100%;
        }
        h3
        {
            text-align: center;
        }
        a{
            color: rgb(160, 158, 158);
        }
        .submit
        {
            background-color: #47cdff;
            border: 1px solid #47cdff;
            border-radius: 5px;
            width: 80px;
            padding: 7px;
            color: white;
            font-weight: bold;
            margin-right: 10px;
        }
        
</style>
</head>

<body>
        @include('auth.header1')
<main class="container-box">
        <h3>register</h3>
        <form action="{{ route('register') }}" method="post">
        @csrf
            <div >
                <label for="name">Name</label>
                <br>
                <input type="text" name="name" id="name">
            </div>
            <div >
                <label for="email">Email Address</label>
                <br>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="password">Password</label>
                <br>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="Confirm password">Confirm Password</label>
                <br>
                <input type="password" name="password_confirmation" id="password_confirmation">
            </div>
            
            <div>
                <button type="submit" class="submit">Register</button>
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
        </form>
        @include('errors')
    </main>
</body>