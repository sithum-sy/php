@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h2 class="my-2 text-center">View Publication</h2>
                    <div class="card-body">

                        <div class="row mb-3">
                            <label for="pub_name" class="col-4 col-form-label text-md-end">{{ __('Name:') }}</label>
                            <label for="pub_name" class="col-4 col-form-label ">{{ $publication->pub_name }}</label>
                        </div>

                        <div class="row mb-3">
                            <label for="isbn" class="col-md-4 col-form-label text-md-end">{{ __('ISBN:') }}</label>
                            <label for="isbn" class="col-4 col-form-label ">{{ $publication->isbn }}</label>
                        </div>

                        <div class="row mb-3">
                            <label for="published_date" class="col-md-4 col-form-label text-md-end">{{ __('Published Date:') }}</label>
                            <label for="published_date" class="col-4 col-form-label ">{{ $publication->published_date }}</label>
                        </div>

                        <div class="row mb-3">
                            <label for="category_id" class="col-md-4 col-form-label text-md-end">{{ __('Category:') }}</label>
                            <label for="category_id" class="col-4 col-form-label ">{{ $publication->category->name }}</label>
                        </div>

                        <div class="row mb-3">
                            <label for="cover_picture" class="col-md-4 col-form-label text-md-end">{{ __('Cover:') }}</label>
                            <label for="cover_picture" class="col-4 col-form-label ">{{ $publication->cover_picture }}</label>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description:') }}</label>
                            <label for="description" class="col-4 col-form-label ">{{ $publication->description }}</label>
                        </div>

                        <div class="col-12 col-md-8 text-center">
                            <img src="{{ asset('uploads/covers/' . $publication->cover_picture) }}" alt="Image Description" class="img-fluid" style="max-width: 50%;">
                        </div>
                        <br>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a class="btn btn-secondary" href="{{ route('publication.all', ['authorId' => Auth::id()]) }}">
                                    << Go Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection