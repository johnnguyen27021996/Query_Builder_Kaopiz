@extends('layouts.layout')

@section('title', 'Create A Post')

@section('content')
    <div class="col-md-10 offset-md-1">
        @if(session()->has('errorMessage'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <strong>Wrong OOP!</strong> {{ session()->get('errorMessage') }}
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
        <form action="{{ route('post.create') }}" method="post" class="border mt-5 p-3">
            @csrf
            <h1 class="text-left text-danger">
                Create A New Post
            </h1>
            <div class="form-group">
                <label for="">Title Post</label>
                <input type="text" name="title" id="" class="form-control" placeholder="Title ...">
            </div>
            <div class="form-group">
                <label for="post-content">Content Post</label>
                <textarea name="body" id="post-content" class="form-control" rows="10" placeholder="Content Title ..."></textarea>
            </div>
            <div class="col-md-5 pl-0">
                <button type="submit" class="btn btn-primary form-control">Save Post</button>
            </div>
        </form>
    </div>
    <script>
        CKEDITOR.replace( 'post-content' );
    </script>
@endsection
