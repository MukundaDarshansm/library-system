@extends('library::layouts.app')

@section('content')
<h2>Edit Book</h2>
<form method="POST" action="{{ route('books.update', $book) }}">
    @csrf @method('PUT')
    <label>Title</label>
    <input name="title" value="{{ old('title', $book->title) }}" required>

    <label>Author</label>
    <input name="author" value="{{ old('author', $book->author) }}" required>

    <label>ISBN</label>
    <input name="isbn" value="{{ old('isbn', $book->isbn) }}" required>

    <label>Status</label>
    <select name="status" required>
        <option value="available" @selected(old('status', $book->status)==='available')>Available</option>
        <option value="unavailable" @selected(old('status', $book->status)==='unavailable')>Unavailable</option>
    </select>

    <button type="submit">Update</button>
</form>
@endsection

