<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller {
    public function index() {
        $books = Book::all();
        return view('index', compact('books'));
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'published_year' => 'required|integer',
        ]);

        Book::create($request->all());
        return redirect()->route('index')->with('success', 'Book added successfully');
    }

    public function edit($id) {
        $book = Book::findOrFail($id);
        return view('edit', compact('book'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'published_year' => 'required|integer',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('index')->with('success', 'Book updated successfully');
    }

    public function destroy($id) {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('index')->with('success', 'Book deleted successfully');
    }
}
