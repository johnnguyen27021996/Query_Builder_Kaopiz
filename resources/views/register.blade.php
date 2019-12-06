@extends('layouts.layout')

@section('title', 'Sign In')

@section('content')
    <div class="col-md-6 offset-md-3">
        <form action="{{ route('login.show') }}" method="post" class="border mt-5 p-3">
            <h1 class="text-center text-danger">
                Sign In
            </h1>
            <div class="form-group">
                <label for="">Your Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="Your Name ...">
            </div>
            <div class="form-group">
                <label for="">Your Email</label>
                <input type="email" name="email" id="" class="form-control" placeholder="Your Email ...">
            </div>
            <div class="form-group">
                <label for="password">Your Password</label>
                <input type="password" id="password" name="password" class="form-control"
                       placeholder="Your Password ..."><br>
                <label for="showpass">Show Password</label><input id="showpass" type="checkbox" name="showpassword">
            </div>
            <div class="col-md-8 offset-md-2 col-sm-12">
                <button type="submit" class="btn btn-primary form-control">Sign Up</button>
                <a href="{{ route('login.show') }}" class="btn btn-outline-danger form-control mt-2">Sign In</a>
            </div>
        </form>
    </div>
@endsection
