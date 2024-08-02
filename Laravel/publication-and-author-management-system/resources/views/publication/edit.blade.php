@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('errors'))
            <h3>Invalid Data</h3>
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </div>
            @endif
            <div class="card">
                <div class="card-header">Edit Publication</div>

                <div class="card-body">
                    <form action="{{ route('publication.update', $publication->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="pub_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="pub_name" name="pub_name" value="{{ $publication->pub_name }}">
                        </div>
                        <div class="mb-3">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $publication->isbn }}">
                        </div>
                        <div class="mb-3">
                            <label for="published_date" class="form-label">Published Date</label>
                            <input type="date" class="form-control" id="published_date" name="published_date" value="{{ $publication->published_date }}">
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <div class="col-md-6">
                                <div class="dropdown">
                                    <select class="form-control" id="category_id" name="category_id" required>
                                        <option value="">{{ $publication->category->name }}</option>
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
                        <div class="mb-3">
                            <label for="cover_picture" class="form-label">Cover Picture</label>
                            <input type="file" class="form-control" id="cover_picture" name="cover_picture">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="text" class="form-control" id="description" name="description">{{ $publication->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection