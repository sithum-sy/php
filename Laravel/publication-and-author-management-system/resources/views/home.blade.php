@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-8">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif


            @auth
            @if (Auth::user()->role === 'admin')
            <div class="card">
                <div class="card-header">Admin Section</div>

                <div class="card-body">
                    <p>Welcome, Admin! Here are your administrative tasks.</p>
                    <div>
                        <a href="{{ route('author.create') }}" class="btn btn-primary btn-lg mb-3">Create Author</a>
                        <a href="{{ route('author.all') }}" class="btn btn-primary btn-lg mb-3">View Authors</a>
                    </div>
                    <div>
                        <a href="{{ route('category.create') }}" class="btn btn-primary btn-lg mb-3">Create Category</a>
                        <a href="{{ route('category.all') }}" class="btn btn-primary btn-lg mb-3">View Category</a>
                    </div>
                </div>
                @elseif (Auth::user()->role === 'author')
                <div class="card">
                    <div class="card-header">Author Section</div>

                    <div class="card-body">
                        <p>Welcome, Author! Here are your author tasks.</p>

                        <a href="{{ route('publication-register') }}" class="btn btn-primary btn-lg mb-3">Create Publication</a>
                        <a href="{{ route('publication.all', ['authorId' => Auth::id()]) }}" class="btn btn-primary btn-lg mb-3">View Publication</a>

                    </div>
                </div>
                @else (Auth::user()->role === 'reader')
                <div class="row bg-light mx-2 p-3">
                    <h2 class="text-center mb-4">All Publications</h2>
                    @foreach ($publications as $publication)
                    <div class="col-md-6 col-lg-3 px-1 my-2 d-flex align-items-stretch">
                        <div class="bg-white p-3 rounded shadow-sm w-100 d-flex flex-column align-items-center">
                            <div class="mb-3">
                                <form action="{{ route('publication_user.view', $publication->id) }}" method="GET" class="w-100">
                                    <button type="submit" style="background: none; border: none; padding: 0;">
                                        <img src="{{ asset('uploads/covers/' . $publication->cover_picture) }}" alt="Image-Description" class="img-fluid rounded" style="max-height: 200px; width: auto;">
                                    </button>
                                </form>
                            </div>
                            <div class="text-center mb-2">
                                <div>
                                    <h3 class="mb-0">
                                        <a href="{{ route('publication_user.view', $publication->id) }}" class="text-decoration-none text-dark">{{ $publication->pub_name }}</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="text-center">
                                <h5 class="text-muted mb-0">{{ $publication->author->first_name }} {{ $publication->author->last_name }}</h5>
                            </div>

                            <div class="mt-3 text-center">
                                <!-- <h4>Average Rating:</h4> -->
                                <!-- <div class="star-rating">
                                    @for ($i = 1; $i <= 5; $i++) <span class="{{ $i <= $publication->averageRating() ? 'filled' : '' }}">&#9733;</span>
                                        @endfor
                                </div>
                                <p>{{ number_format($publication->averageRating(), 1) }} ({{ $publication->ratingCount() }} {{ Str::plural('rating', $publication->ratingCount()) }})</p> -->
                                <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $publication->averageRating }}" data-size="xs" disabled="">
                            </div>

                            <div class="mt-3 text-center">
                                <a href="{{ route('publications_user.like', $publication->id) }}" class="btn btn-primary btn-sm mb-3"><span>{{ $publication->likes->count() }} </span>{{ $publication->likes->count() > 1 ? 'Likes' : 'Like' }}</a>
                                <a href="{{ route('publications_user.comments', $publication->id) }}" class="btn btn-primary btn-sm mb-3"><span>Count </span>Comment</a>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination Links -->
                <div class="d-flex justify-content-center mt-4">
                    <div>
                        {{ $publications->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>

                @endif
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection