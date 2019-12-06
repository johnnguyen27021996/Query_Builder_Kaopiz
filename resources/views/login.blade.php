<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--    css bootstrap--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    {{--    js bootstrap--}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Sign In</title>
    <style>

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="{{ route('login.login') }}" method="post" class="border mt-5 p-3">
                    <h1 class="text-center text-danger">
                        Sign In
                    </h1>
                    <div class="form-group">
                        <label for="">Your Email</label>
                        <input type="email" name="email" id="" class="form-control" placeholder="Your Email ...">
                    </div>
                    <div class="form-group">
                        <label for="password">Your Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Your Password ...">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="showpass">
                            <label class="custom-control-label" for="showpass">Show Password</label>
                        </div>
                    </div>
                    <div class="col-md-8 offset-md-2 col-sm-12">
                        <button type="submit" class="btn btn-primary form-control">Sign In</button>
                        <a href="{{ route('register.show') }}" class="btn btn-outline-danger form-control mt-2">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#showpass').click(function () {
                if( $(this).is(':checked') ){
                    $('#password').attr('type', 'text');
                }else{
                    $('#password').attr('type', 'password');
                }
            })
        })
    </script>
</body>
</html>
