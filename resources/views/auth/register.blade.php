
<html>
    <head>
        <title>auth:: Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width" initial-scale="1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body>
        
        <div class="container margin-top:20px;">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Register</h2>
                    <form action="{{route('register-user')}}" method="post">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        @csrf
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="name" >Enter your Name</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                <span class="text-danger">@error('name'){{$message}}@enderror</span>
                            </div>
                        </div>
                        
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="email" >Enter your Email</label>
                                <input type="email" name="email" class="form-control" value="{{old('email')}}">
                                <span class="text-danger">@error('email'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="password" >Enter your Password</label>
                                <input type="password" name="password" class="form-control">
                                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="name" ></label>
                                <button class="btn btn-block btn-primary"type="Submit" class="form-control"> Submit</button> 
                            </div>
                        </div>
                    </form>
                </div>
                <br>
                <a href="login">Already registered!. Login</a>
            </div>
        </div>
    
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>