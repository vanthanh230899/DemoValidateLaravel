<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Validation</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery/lib/jquery-3.1.1.js')}}"></script>
    <script src="{{asset('js/jquery/dist/jquery.validate.min.js')}}"></script>
</head>

<body>
    <div class="container">
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $orr)
            {{$orr}}<br>
            @endforeach
        </div>
        @endif
        @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
        @endif
        <form action="" method="post" class="form-demo">
            @csrf()
            <div class="form-group">
                <label for="username">username:</label>
                <input type="text" name="username" class="form-control" placeholder="Enter username" id="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" id="password" required
                    minlength="6">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="rePassword" class="form-control" placeholder="Enter password again" id="rePassword" required
                    minlength="6">
            </div>
           
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>

</html>