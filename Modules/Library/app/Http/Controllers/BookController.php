<?php
namespace Modules\Library\app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Library\app\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(10);
        return view('library::books.index', compact('books'));
    }

    public function create()
    {
        return view('library::books.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'author' => ['required','string','max:255'],
            'isbn' => ['required','string','max:255','unique:books,isbn'],
            'status' => ['required','in:available,unavailable'],
        ]);
        Book::create($data);
        return redirect()->route('books.index')->with('success', 'Book created');
    }

    public function edit(Book $book)
    {
        return view('library::books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'author' => ['required','string','max:255'],
            'isbn' => ['required','string','max:255','unique:books,isbn,'.$book->id],
            'status' => ['required','in:available,unavailable'],
        ]);
        $book->update($data);
        return redirect()->route('books.index')->with('success', 'Book updated');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted');
    }
}
