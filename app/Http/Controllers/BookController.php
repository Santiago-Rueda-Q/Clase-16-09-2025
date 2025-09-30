<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::orderBy('name')->get(['id','name']);
        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'            => ['required','string','max:255'],
            'synopsis'         => ['nullable','string'],
            'publication_year' => ['required','date'], // el campo es DATE en la migración
            'author_id'        => ['required','exists:authors,id'],
        ]);

        Book::create($data);

        return redirect()->route('books.index')
            ->with('success', 'Libro creado correctamente.');
    }

    public function show(Book $book)
    {
        $book->load('author');
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::orderBy('name')->get(['id','name']);
        return view('books.edit', compact('book','authors'));
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title'            => ['required','string','max:255'],
            'synopsis'         => ['nullable','string'],
            'publication_year' => ['required','date'],
            'author_id'        => ['required','exists:authors,id'],
        ]);

        $book->update($data);

        return redirect()->route('books.index')
            ->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')
            ->with('success', 'Libro eliminado correctamente.');
    }
}
