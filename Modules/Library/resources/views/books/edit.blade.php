@extends('library::layouts.app')

@section('content')
<h2>Edit Book</h2>
<form method="POST" action="{{ route('books.update', $book) }}" class="row g-3">
    @csrf @method('PUT')

    <div class="col-md-6">
        <label class="form-label">Title</label>
        <input name="title" class="form-control" value="{{ old('title', $book->title) }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Author</label>
        <input name="author" class="form-control" value="{{ old('author', $book->author) }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">ISBN</label>
        <input name="isbn" class="form-control" value="{{ old('isbn', $book->isbn) }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
            <option value="available" @selected(old('status', $book->status)==='available')>Available</option>
            <option value="unavailable" @selected(old('status', $book->status)==='unavailable')>Unavailable</option>
        </select>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-warning">Update</button>
    </div>
</form>
@endsection
