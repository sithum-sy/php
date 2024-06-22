@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
                <div class="col">
                    <h2 class="my-2 text-center">View Category</h2>
                    <div class="card-body">

                        <div class="row mb-3">
                            <label for="name" class="col-4 col-form-label text-md-end">{{ __('Category Name:') }}</label>
                            <label for="name" class="col-4 col-form-label ">{{ $category->name }}</label>

                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a class="btn btn-secondary" href="{{ route('category.all') }}">
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