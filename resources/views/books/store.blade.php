@props(['allAuthors'])

<x-dashboard.layout>
    <form class="mb-4 max-w-lg" method="POST" action="{{ route('books.store') }}">
        @csrf
        <x-form.input name="title" label="title" />
        <x-form.input name="publication_year" label="Year Of Production" />
        <x-form.select name="status" label="Status" :options="['Free', 'Busy']" value="" />
        <x-form.multiple-select name="authors" label="Authors" :options="$allAuthors" value="" />

        <x-form.button>Create Book</x-form.button>
    </form>
</x-dashboard.layout>
