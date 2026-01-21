@extends('library::layouts.app')

@section('content')
<h1>Admin Dashboard</h1>
<p>You have full access to manage books.</p>
<a href="{{ route('books.create') }}">Create Book</a>
@endsection
