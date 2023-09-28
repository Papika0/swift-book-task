@props(['books'])

<x-dashboard.layout>
    <form class="mb-4 max-w-lg" method="POST" action="{{ route('authors.store') }}">
        @csrf
        <x-form.input name="name" label="name" />
        <x-form.multiple-select name="books" label="Books" :options="$books" :value="[]" />

        <x-form.button>Create Author</x-form.button>
    </form>
</x-dashboard.layout>
