<?php
namespace Modules\Library\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Library\Models\Book;

class BookApiController extends Controller
{
    public function index()
    {
        return response()->json(Book::paginate(10));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'author' => ['required','string','max:255'],
            'isbn' => ['required','string','max:255','unique:books,isbn'],
            'status' => ['required','in:available,unavailable'],
        ]);
        $book = Book::create($data);
        return response()->json($book, 201);
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
        return response()->json($book);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(null, 204);
    }
}
