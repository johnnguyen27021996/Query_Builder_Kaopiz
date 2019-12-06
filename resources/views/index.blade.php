@extends('layouts.layout')

@section('title', 'Nguyễn Thành Trung')

@section('content')
    <div class="col-md-12">
        <div class="card mt-2">
            <div class="card-header">
                <h4 class="float-left">All Posts</h4>
                @if(session()->has('user'))
                    <div class="float-right">
                        <a href="" class="btn btn-outline-danger">New Post</a>
                    </div>
                @endif
            </div>
            <div class="card-body">
                @foreach($posts as $post)
                    <div class="item">
                        <a href="">
                            <h3>{{ $post->title }}</h3>
                        </a>
                        <div class="post-content">
                            {!! \Illuminate\Support\Str::limit($post->content, 200) !!}
                        </div>
                        <a href="" class="btn btn-outline-primary mt-2">See More ...</a>
                        <hr>
                    </div>
                @endforeach
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
