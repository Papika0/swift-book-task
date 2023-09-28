<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UpdateAuthorRequest;

class AuthorController extends Controller
{
    public function index()
    {
        return view('authors.index', [
            'authors' => Author::all()
        ]);
    }

    // public function create(): View
    // {
    //     return view('authors.store');
    // }

    // public function store(StoreBookRequest $request): RedirectResponse
    // {
    //     Author::create($request->validated());

    //     return redirect()->route('authors.index');
    // }

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
