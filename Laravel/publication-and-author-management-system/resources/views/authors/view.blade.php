@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h2 class="my-2 text-center">View Author</h2>
                    <div class="card-body">

                        <div class="row mb-3">
                            <label for="first_name" class="col-4 col-form-label text-md-end">{{ __('First Name:') }}</label>
                            <label for="first_name" class="col-4 col-form-label ">{{ $author->first_name }}</label>

                        </div>

                        <div class="row mb-3">
                            <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name:') }}</label>
                            <label for="last_name" class="col-4 col-form-label ">{{ $author->last_name }}</label>


                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address:') }}</label>
                            <label for="email" class="col-4 col-form-label ">{{ $author->email }}</label>


                        </div>

                        <div class="row mb-3">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number:') }}</label>
                            <label for="phone_number" class="col-4 col-form-label ">{{ $author->phone_number }}</label>


                        </div>

                        <div class="row mb-3">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth:') }}</label>
                            <label for="date_of_birth" class="col-4 col-form-label ">{{ $author->date_of_birth }}</label>


                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address:') }}</label>
                            <label for="address" class="col-4 col-form-label ">{{ $author->address }}</label>


                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender:') }}</label>
                            <label for="gender" class="col-4 col-form-label ">{{ $author->gender }}</label>


                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a class="btn btn-secondary" href="{{ route('author.all') }}">
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