@extends('library::layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Books</h2>
    @if(auth()->user()->hasRole('admin'))
        <a href="{{ route('books.create') }}" class="btn btn-success">+ New Book</a>
    @endif
</div>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Title</th><th>Author</th><th>ISBN</th><th>Status</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->isbn }}</td>
            <td>
                <span class="badge bg-{{ $book->status === 'available' ? 'success' : 'secondary' }}">
                    {{ ucfirst($book->status) }}
                </span>
            </td>
            <td>
                @if(auth()->user()->hasRole('admin'))
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="{{ route('books.destroy', $book) }}" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                @else
                    <em>View only</em>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $books->links('pagination::bootstrap-5') }}
@endsection
