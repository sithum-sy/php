@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('author.create') }}">Add Authors</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Authors List</div>

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
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">DOB</th>
                                <th scope="col">Address</th>
                                <th scope="col">Contact Number</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authors as $author)
                            <tr>
                                <td>{{ $author->id }}</td>
                                <td>{{ $author->first_name }}</td>
                                <td>{{ $author->last_name }}</td>
                                <td>{{ $author->email }}</td>
                                <td>{{ $author->date_of_birth }}</td>
                                <td>{{ $author->address }}</td>
                                <td>{{ $author->phone_number }}</td>
                                <td>{{ $author->gender }}</td>
                                <!-- <td>{{ $author->is_active ? 'Active' : 'Inactive' }}</td> -->
                                @if($author->is_active)
                                <td>Active</td>
                                @else
                                <td>Inactive</td>
                                @endif

                                <td>
                                    <!-- Action buttons -->
                                    <a href="{{ route('author.view', $author->id) }}" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('author.edit', $author->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('author.delete', $author->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                    <form action="{{ route('author.toggleStatus', $author->id) }}" method="#" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm {{ $author->is_active ? 'btn-secondary' : 'btn-success' }}">
                                            {{ $author->is_active ? 'Deactivate' : 'Activate' }}
                                        </button>
                                    </form>
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