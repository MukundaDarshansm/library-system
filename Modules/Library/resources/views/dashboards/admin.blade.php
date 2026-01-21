@extends('library::layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="card-title">Admin Dashboard</h1>
        <p class="card-text">You have full access to manage books.</p>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Create Book</a>
    </div>
</div>
@endsection
