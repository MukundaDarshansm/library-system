@extends('library::layouts.app')

@section('content')
<h2>Create Book</h2>
<form method="POST" action="{{ route('books.store') }}">
    @csrf
    <label>Title</label>
    <input name="title" value="{{ old('title') }}" required>
    @error('title') <div>{{ $message }}</div> @enderror

    <label>Author</label>
    <input name="author" value="{{ old('author') }}" required>
    @error('author') <div>{{ $message }}</div> @enderror

    <label>ISBN</label>
    <input name="isbn" value="{{ old('isbn') }}" required>
    @error('isbn') <div>{{ $message }}</div> @enderror

    <label>Status</label>
    <select name="status" required>
        <option value="available" @selected(old('status')==='available')>Available</option>
        <option value="unavailable" @selected(old('status')==='unavailable')>Unavailable</option>
    </select>
    @error('status') <div>{{ $message }}</div> @enderror

    <button type="submit">Save</button>
</form>
@endsection
