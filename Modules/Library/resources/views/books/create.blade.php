@extends('library::layouts.app')

@section('content')
<h2>Create Book</h2>
<form method="POST" action="{{ route('books.store') }}" class="row g-3">
    @csrf
    <div class="col-md-6">
        <label class="form-label">Title</label>
        <input name="title" class="form-control" value="{{ old('title') }}" required>
        @error('title') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Author</label>
        <input name="author" class="form-control" value="{{ old('author') }}" required>
        @error('author') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">ISBN</label>
        <input name="isbn" class="form-control" value="{{ old('isbn') }}" required>
        @error('isbn') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
            <option value="available" @selected(old('status')==='available')>Available</option>
            <option value="unavailable" @selected(old('status')==='unavailable')>Unavailable</option>
        </select>
        @error('status') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
@endsection
