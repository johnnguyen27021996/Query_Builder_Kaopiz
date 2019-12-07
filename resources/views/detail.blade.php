@extends('layouts.layout')

@section('title', 'Post Detail')

@section('content')
    <div class="col-md-12">
        @if(session()->has('successMessage'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <strong>Success!</strong> {{ session()->get('successMessage') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session()->has('errorMessage'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <strong>Success!</strong> {{ session()->get('errorMessage') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card mt-2">
            <div class="card-header">
                <h4 class="float-left">
                    <a href="{{ route('post.detail', $post[0]->id) }}">
                        {{ $post[0]->title }}
                    </a>
                </h4>
                <a href="{{ route('index.show') }}" class="btn btn-outline-danger float-right">All Post</a>
            </div>
            <div class="card-body">
                <div class="item">
                    <div class="post-content">
                        {!! $post[0]->content !!}
                    </div>
                    <hr>
                    <div class="all-comment">
                        <h4 class="text-danger">All Comments</h4>
                        @if(count($comments) > 0)
                            <ol>
                                @foreach($comments as $comment)
                                    <li>{!! $comment->content_comment !!}</li>
                                @endforeach
                            </ol>
                        @else
                            <h5 class="text-muted">Not A Comment. Leave A Comment</h5>
                        @endif
                    </div>
                    <div class="col-md-6 pl-0 comment">
                        <form action="{{ route('comment.create', $post[0]->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="post-comment" class="text-danger">Leave A Comment</label>
                                <textarea name="comment" id="post-comment" class="form-control" rows="5" placeholder="Comment ..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Comment</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
