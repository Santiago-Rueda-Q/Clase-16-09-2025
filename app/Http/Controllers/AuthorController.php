<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::latest()->paginate(10);
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => ['required','string','max:255'],
            'email'      => ['required','email','max:255','unique:authors,email'],
            'birth_date' => ['required','date'],
            'biography'  => ['nullable','string'],
        ]);

        Author::create($data);

        return redirect()->route('authors.index')
            ->with('success', 'Autor creado correctamente.');
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $data = $request->validate([
            'name'       => ['required','string','max:255'],
            'email'      => ['required','email','max:255', Rule::unique('authors','email')->ignore($author->id)],
            'birth_date' => ['required','date'],
            'biography'  => ['nullable','string'],
        ]);

        $author->update($data);

        return redirect()->route('authors.index')
            ->with('success', 'Autor actualizado correctamente.');
    }

    public function destroy(Author $author)
    {
        $author->delete(); 
        return redirect()->route('authors.index')
            ->with('success', 'Autor eliminado correctamente.');
    }
}
