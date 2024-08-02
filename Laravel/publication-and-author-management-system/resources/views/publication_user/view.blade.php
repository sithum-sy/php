@extends('layouts.app')

@section('content')


<!-- resources/views/book.blade.php -->

<div class="container mt-5">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="row">
        <!-- Cover Image and Book Details -->
        <div class="col-md-4 col-lg-3">
            <div class="card">
                <img src="{{ asset('uploads/covers/' . $publication->cover_picture) }}" class="card-img-top img-fluid" alt="{{ $publication->pub_name }}">

            </div>
        </div>

        <!-- Book Description -->
        <div class="col-md-8 col-lg-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $publication->pub_name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">by {{ $publication->author->first_name }} {{ $publication->author->last_name }}</h6>
                    <p class="card-text">Category: {{ $publication->category->name }}</p>
                    <p class="card-text">ISBN: {{ $publication->isbn }}</p>
                    <!-- <a href="#" class="btn btn-primary">Buy Now</a> -->

                </div>
                <div class="card-body">
                    <h5 class="card-title">Description</h5>
                    <p class="card-text" id="description-text">{{ $publication->description }}</p>
                    <!-- Read More / Collapse Section -->
                    <!-- @if(strlen($publication->description) > 500)
                    <a href="#" id="read-more" class="btn btn-link">Read More</a>
                    @endif -->
                </div>
            </div>

            <!-- Rating Form -->


            @auth
            <form action="{{ route('rating.store', $publication->id) }}" method="POST" class="mt-4">
                @csrf
                <!-- <div class="form-group">
                    <label for="rating">Rate this publication:</label>
                    <div class="rating">
                        @for ($i = 1; $i <= 5; $i++) <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" required>
                            <label for="star{{ $i }}" title="{{ $i }} star{{ $i > 1 ? 's' : '' }}">
                                <i class="fa fa-star"></i>
                            </label>
                            @endfor
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit Rating</button> -->

                <div class="details col-md-6">
                    <h3 class="product-title">Rate this book</h3>
                    <div class="rating">
                        <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $publication->userAverageRating }}" data-size="xs">
                        <input type="hidden" name="id" required="" value="{{ $publication->id }}">
                        <br />
                        <button type="submit" class="btn btn-success  mt-2">Submit</button>
                    </div>
                </div>
            </form>
            @else
            <p>Please <a href="{{ route('login') }}">login</a> to rate this publication.</p>
            @endauth
        </div>



    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const readMoreBtn = document.getElementById('read-more');
        const descriptionText = document.getElementById('description-text');

        if (readMoreBtn) {
            readMoreBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (descriptionText.style.maxHeight) {
                    descriptionText.style.maxHeight = null;
                    readMoreBtn.textContent = 'Read More';
                } else {
                    descriptionText.style.maxHeight = descriptionText.scrollHeight + 'px';
                    readMoreBtn.textContent = 'Read Less';
                }
            });

            // Set initial max-height for collapse effect
            descriptionText.style.maxHeight = '150px'; // Adjust as needed
            descriptionText.style.overflow = 'hidden';
        }
    });
</script>
@endsection