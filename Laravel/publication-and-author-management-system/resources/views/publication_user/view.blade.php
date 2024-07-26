@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h2 class="my-2 text-center">{{ $publication->pub_name }}</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Author:</label>
                        <div class="col-md-4 col-form-label">{{ $publication->author->first_name }} {{ $publication->author->last_name }}</div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">ISBN:</label>
                        <div class="col-md-4 col-form-label">{{ $publication->isbn }}</div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Published Date:</label>
                        <div class="col-md-4 col-form-label">{{ $publication->published_date }}</div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Category:</label>
                        <div class="col-md-4 col-form-label">{{ $publication->category->name }}</div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-4 col-form-label text-md-end">Cover:</label>
                        <div class="col-md-4 col-form-label">
                            <img src="{{ asset('uploads/covers/' . $publication->cover_picture) }}" alt="Cover Image" class="img-fluid" style="max-width: 50%;">
                        </div>
                    </div>

                    <form action="{{ route('publications_user.like', $publication->id) }}" method="POST" id="like-form">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            {{ $publication->likes()->where('user_id', auth()->id())->exists() ? 'Unlike' : 'Like' }}
                        </button>
                        <span class="badge badge-light like-count" id="like-count-{{ $publication->id }}">{{ $publication->likes->count() }}</span>
                    </form>

                    <div class="comment-section mt-4">
                        <h6>Comments</h6>
                        <div id="comments-{{ $publication->id }}">
                            @foreach($publication->comments as $comment)
                            <div class="comment">
                                <p><strong>{{ $comment->user->name }}</strong> says:</p>
                                <p>{{ $comment->content }}</p>
                                <small>{{ $comment->created_at->diffForHumans() }}</small>
                            </div>
                            @endforeach
                        </div>
                        <form action="{{ route('publications_user.comments', $publication->id) }}" method="POST" id="comment-form-{{ $publication->id }}">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="content" rows="3" placeholder="Add a comment..." required></textarea>
                            </div><br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                    <br>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a class="btn btn-secondary" href="{{ route('home') }}">
                                << Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection