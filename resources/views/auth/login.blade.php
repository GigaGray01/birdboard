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
        
        input[type="email"],input[type="password"]
        {
            border :1px solid rgb(223, 222, 222);
            border-radius: 3px;
            margin: 8px 0 1em 0;
            padding: 13px;
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
        .checkbox-round {
            width: 1.3em;
            height: 1.3em;
            background-color: white;
            border-radius: 20%;
            vertical-align: middle;
            border: 1px solid #ddd;
            -webkit-appearance: none;
            outline: none;
            cursor: pointer;
        }
</style>
</head>
<body>
    @include('auth.header1')

<main class="container-box">
    <h3>Login</h3>
    <form action="{{ route('login') }}" method="post">
        @csrf
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
            <label for="remember_me">
                <input id="remember_me" type="checkbox" name="remember" class="checkbox-round ">
                <span>Remember me</span>
            </label>
        </div>
        <div>
            <button type="submit" class="submit">Login</button>
            <a href="{{ route('password.request') }}">Forgot your password?</a>
        </div>
    </form>
    @include('errors')
    
    </main>

</body>
