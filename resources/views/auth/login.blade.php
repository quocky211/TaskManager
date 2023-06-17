<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/custom.css')}}" type="text/css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h4>Login</h4>
            <form action="{{route('login-account')}}" method="post">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-danger">
                            {{Session::get('fail')}}
                        </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class ="form-control" placeholder="Enter Email"
                        name="email" value="{{old('email')}}">
                    </div>
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class ="form-control" placeholder="Enter Password"
                        name="password" value="{{old('password')}}">
                    </div>
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">
                            Login
                        </button>
                    </div>
                    <br>
                    <a href="registration">
                        Register Here.
                    </a>          
                    <br>
        <form>
        </div>
    </div>
    
</body>
</html>