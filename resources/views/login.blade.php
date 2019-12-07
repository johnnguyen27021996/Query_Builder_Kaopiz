@extends('layouts.layout')

@section('title', 'Sign In')

@section('content')
    <div class="col-md-6 offset-md-3">
        @if(session()->has('errorLogin'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <strong>Wrong OOP!</strong> {{ session()->get('errorLogin') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        @endif
        <form action="{{ route('login.login') }}" method="post" class="border mt-5 p-3">
            @csrf
            <h1 class="text-center text-danger">
                Sign In
            </h1>
            <div class="form-group">
                <label for="">Your Email</label>
                <input type="email" name="email" id="" class="form-control" placeholder="Your Email ...">
            </div>
            <div class="form-group">
                <label for="password">Your Password</label>
                <input type="password" id="password" name="password" class="form-control"
                       placeholder="Your Password ...">
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
    <script>
        $(document).ready(function () {
            $('#showpass').click(function () {
                if ($(this).is(':checked')) {
                    $('#password').attr('type', 'text');
                } else {
                    $('#password').attr('type', 'password');
                }
            })
        })
    </script>
@endsection
