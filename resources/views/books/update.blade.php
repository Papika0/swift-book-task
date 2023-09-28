@props(['book, allAuthors'])

<x-dashboard.layout>
    <form class="mb-4 max-w-lg" method="POST" action="{{ route('books.update', $book->id) }}">
        @csrf
        @method('PUT')
        <x-form.input name="title" label="title" :value="old('title', $book->title)" />
        <x-form.input name="publication_year" label="Year Of Production" :value="old('publication_year', $book->publication_year)" />
        <x-form.select name="status" label="Status" :value="old('status', $book->status)" :options="['Free', 'Busy']" />
        <x-form.multiple-select name="authors[]" label="Authors" :options="$allAuthors" :value="old('authors', $book->authors->pluck('id')->toArray())" />

        <x-form.button>Update Book</x-form.button>
    </form>
</x-dashboard.layout>
