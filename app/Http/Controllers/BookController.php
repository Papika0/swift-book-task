<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;

class BookController extends Controller
{
    public function index()
    {
        return view('books.index', [
            'books' => Book::all()
        ]);
    }

    public function create(): View
    {
        return view('books.store' , [
            'allAuthors' => Author::all()->pluck('name', 'id')->toArray()
        ]);
    }

    public function store(StoreBookRequest $request): RedirectResponse
    {
        $book = Book::create($request->validated());
        $authorIds = collect($request->input('authors'))->flatten()->all();
        $book->authors()->sync($authorIds);

        return redirect()->route('books.index');
    }

    public function edit(Book $book): View
    {
        return view('books.update', [
            'book' => $book,
            'allAuthors' => Author::all()->pluck('name', 'id')->toArray()
        ]);
    }

    public function update(UpdateBookRequest $request, Book $book): RedirectResponse
    {
        $book->update($request->validated());
        $authorIds = collect($request->input('authors'))->flatten()->all();
        $book->authors()->sync($authorIds);
        return redirect()->route('books.index');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
