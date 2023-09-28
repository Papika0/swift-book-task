@props(['author'])

<x-dashboard.layout>
    <form class="mb-4 max-w-lg" method="POST" action="{{ route('authors.update', $author->id) }}">
        @csrf
        @method('PUT')
        <x-form.input name="name" label="title" :value="old('name', $author->name)" />
        <x-form.button>Update Author</x-form.button>
    </form>
</x-dashboard.layout>
