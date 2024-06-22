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
                <div class="card">
                    <div class="card-header">User Section</div>

                    <div class="card-body">
                        <p>Welcome, User! Here is your content.</p>
                        <!-- Add user specific content here -->
                    </div>
                </div>

                @endif
                @endauth
            </div>
        </div>
        @endsection