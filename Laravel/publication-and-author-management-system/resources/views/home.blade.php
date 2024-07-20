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
                    <!-- Add admin specific content here -->
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
                        <!-- Add author specific content here -->

                        <a href="{{ route('publication-register') }}" class="btn btn-primary btn-lg mb-3">Create Publication</a>

                    </div>
                </div>
                @else (Auth::user()->role === 'reader')
                <div class="row bg-light mx-2">
                    @foreach ($publications as $publication)
                    <div class="col-4 px-1 my-2">
                        <div class="row mx-2 bg-white">
                            <div class="col">
                                <div class="row">
                                    <div class="h3">
                                        {{ $publication->pub_name }}
                                    </div>
                                </div>
                                <div class="row">
                                    <img src="{{ asset('uploads/covers/' . $publication->cover_picture) }}" alt="Image Description" class="img-fluid" height="50" width="50">
                                </div>
                                <div class="row">
                                    <div class="col">Author: {{ $publication->author->first_name }} {{ $publication->author->last_name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col">Category: {{ $publication->category->name }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">ISBN: {{ $publication->isbn }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">Published Date:{{ $publication->published_date }}</div>
                                </div>
                                <div class="row">
                                    <div class="col">Like</div>
                                    <div class="col">Comment</div>
                                </div>
                            </div>

                        </div>


                        <!-- <div class="card">
                            <div class="card-header">
                                <h5>{{ $publication->pub_name }}</h5>
                            </div>

                            <div class="card-body">
                                <p>Publication Details</p>
                                <ul>
                                    <li>Name: {{ $publication->pub_name }}</li>
                                    <li>Cover: {{ $publication->cover_picture }}</li>
                                    <li>Author: {{ $publication->author }}</li>
                                    <li>Category Name: {{ $publication->category->name }}</li>
                                    <li>ISBN Number: {{ $publication->isbn }}</li>
                                    <li>Published Date: {{ $publication->published_date }}</li>
                                    <li>Like Button</li>
                                    <li>Comment Button</li>
                                </ul>
                                <img src="{{ asset('uploads/covers/' . $publication->cover_picture) }}" alt="Image Description" class="img-fluid" height="100" width="100">
                            </div>
                        </div>
                        <br> -->


                    </div>
                    @endforeach
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection