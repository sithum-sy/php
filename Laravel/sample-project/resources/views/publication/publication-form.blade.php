@extends('layouts.app')

@section('content')
<div class="container custom-padding">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-custom">
                <div class="card-header">
                    <h4>{{ __('Publication Registration') }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="#">
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