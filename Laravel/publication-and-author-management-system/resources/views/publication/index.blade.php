@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('publication-register') }}">Add Publication</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Publications List</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">ISBN</th>
                                <th scope="col">Published Date</th>
                                <th scope="col">Cover Picture</th>
                                <!-- <th scope="col">Status</th> -->
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publications as $publication)
                            <tr>
                                <td>{{ $publication->id }}</td>
                                <td>{{ $publication->pub_name }}</td>
                                <td>{{ $publication->category->name }}</td>
                                <td>{{ $publication->isbn }}</td>
                                <td>{{ $publication->published_date }}</td>
                                <td> <img src="{{ asset('uploads/covers/' . $publication->cover_picture) }}" alt="Image Description" class="img-fluid" height="50" width="50">
                                </td>
                                <!-- <td>{{ $publication->is_active ? 'Active' : 'Inactive' }}</td> -->
                                <!-- @if($publication->is_active)
                                <td>Active</td>
                                @else
                                <td>Inactive</td>
                                @endif -->

                                <td>
                                    <!-- Action buttons -->
                                    <a href="{{ route('publication.view', $publication->id) }}" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('publication.edit', $publication->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('publication.delete', $publication->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                    <!-- <form action="{{ route('publication.toggleStatus', $publication->id) }}" method="#" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm {{ $publication->is_active ? 'btn-secondary' : 'btn-success' }}">
                                            {{ $publication->is_active ? 'Deactivate' : 'Activate' }}
                                        </button>
                                    </form> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection