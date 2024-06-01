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

            <a href="{{ route('author.create')}}" class="btn btn-primary btn-lg mb-3">Create Author Form</a>
        </div>
    </div>
    @endsection