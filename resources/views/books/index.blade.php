@props(['authors' => $authors])

<x-dashboard.layout>
    <div class="flex border-2 border-gray-200 rounded-md focus-within:ring-2 ring-teal-500 w-1/3">
        <form method="GET" action="{{ route('books.index') }}" class="m-4 flex flex-row w-full">
            <input type="text" name="search" value="{{ request()->input('search') }}"
                class="w-full rounded-tl-md rounded-bl-md px-2 py-3 text-sm text-gray-600 focus:outline-none"
                placeholder="Search Book" />

            <select name="author_id"
                class="w-2/5 rounded-tr-md rounded-br-md px-2 py-3 text-sm text-gray-600 focus:outline-none">
                <option value="">Select Author</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}"
                        {{ request()->input('author_id') == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="rounded-tr-md rounded-br-md px-2 py-3 hidden md:block">
                <svg class="w-4 h-4 fill-current" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </form>
    </div>
    <x-table :data="$books" type="books" />
</x-dashboard.layout>
