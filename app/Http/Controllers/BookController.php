<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterBookRequest;
use App\Models\Book;
use App\Models\Author;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    public function index(FilterBookRequest $request)
    {
        $searchQuery = $request->search;
        $authorId = $request->author_id;

        $books = Book::when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('title', 'like', '%' . $searchQuery . '%');
        })
        ->when($authorId, function ($query) use ($authorId) {
            $query->whereHas('authors', function ($subquery) use ($authorId) {
                $subquery->where('authors.id', $authorId);
            });
        })
        ->get();

        return view('books.index', [
            'books' => $books,
            'authors' => Author::all(),
        ]);
    }


    public function create(): View
    {
        return view('books.store', [
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
