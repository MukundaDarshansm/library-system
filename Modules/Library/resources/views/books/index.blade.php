@extends('library::layouts.app')

@section('content')
<h2>Books</h2>

@auth
    @if(auth()->user()->hasRole('admin'))
        <a href="{{ route('books.create') }}">+ New Book</a>
    @endif
@endauth

<table border="1" cellpadding="6">
    <thead>
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
            <td>{{ ucfirst($book->status) }}</td>
            <td>
                @if(auth()->user()->hasRole('admin'))
                    <a href="{{ route('books.edit', $book) }}">Edit</a>
                    <form method="POST" action="{{ route('books.destroy', $book) }}" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                @else
                    <em>View only</em>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $books->links() }}
@endsection
