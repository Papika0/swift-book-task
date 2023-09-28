<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;

class AuthorController extends Controller
{
    public function index()
    {
        return view('authors.index', [
            'authors' => Author::all()
        ]);
    }

    public function create(): View
    {
        return view('authors.store', ['books' => Book::all()->pluck('title', 'id')->toArray()]);
    }

    public function store(StoreAuthorRequest $request): RedirectResponse
    {
        $author = Author::create($request->validated());

        $bookIds = collect($request->input('books'))->flatten()->all();
        $author->books()->sync($bookIds);

        return redirect()->route('authors.index');
    }

    public function edit(Author $author): View
    {
        return view('authors.update', [
            'author' => $author,
        ]);
    }

    public function update(UpdateAuthorRequest $request, Author $author): RedirectResponse
    {
        $author->update($request->validated());

        return redirect()->route('authors.index');
    }

    public function destroy(Author $author): RedirectResponse
    {
        $author->delete();

        return redirect()->route('authors.index');
    }
}
