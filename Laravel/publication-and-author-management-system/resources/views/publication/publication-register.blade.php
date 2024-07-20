@extends('layouts.app')

@section('content')
<!-- Link to the custom CSS file
<link href="{{ asset('resources/css/app.css') }}" rel="stylesheet"> -->

<style>
    /* Background styles */
    body {
        /* background-image: url('https://images.unsplash.com/photo-1519681393784-d120267933ba?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1124&q=100'); */
        background-image: url('{{ asset("images/background/1.jpg") }}');
        background-position: center;
        background-size: auto;
        height: 80vh;
        display: flexbox;
        justify-content: center;
        align-items: center;
    }

    /* Glassmorphism card effect */
    .card-custom {
        backdrop-filter: blur(16px) saturate(180%);
        -webkit-backdrop-filter: blur(16px) saturate(180%);
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.5);
        color: black;
        /* Ensure text is visible on dark background */
    }

    /* Custom padding */
    .custom-padding {
        padding-top: 80px;
        /* Adjust as needed */
    }
</style>
<div class="container custom-padding">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
            @endif

            <div class="card card-custom">
                <div class="card-header">
                    <h4>{{ __('Publication Registration') }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('publication.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="pub_name" class="col-md-4 col-form-label text-md-end">{{ __('Publication Name') }}</label>

                            <div class="col-md-6">
                                <input id="pub_name" type="text" class="form-control @error('pub_name') is-invalid @enderror" name="pub_name" value="{{ old('pub_name') }}" required autocomplete="pub_name" autofocus>

                                @error('pub_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="isbn" class="col-md-4 col-form-label text-md-end">{{ __('ISBN') }}</label>

                            <div class="col-md-6">
                                <input id="isbn" type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn" value="{{ old('isbn') }}" required autocomplete="isbn" autofocus>

                                @error('isbn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="published_date" class="col-md-4 col-form-label text-md-end">{{ __('Published Date') }}</label>

                            <div class="col-md-6">
                                <input id="published_date" type="date" class="form-control @error('published_date') is-invalid @enderror" name="published_date" value="{{ old('published_date') }}" required autocomplete="published_date" autofocus>

                                @error('published_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="category_id" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <div class="dropdown">
                                    <select class="form-control" id="category_id" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                        </div>

                        <div class="row mb-3">
                            <label for="cover_picture" class="col-md-4 col-form-label text-md-end">{{ __('Cover Picture') }}</label>

                            <div class="col-md-6">
                                <input id="cover_picture" type="file" class="form-control @error('cover_picture') is-invalid @enderror" name="cover_picture" value="{{ old('cover_picture') }}" autocomplete="cover_picture" autofocus>

                                @error('cover_picture')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection