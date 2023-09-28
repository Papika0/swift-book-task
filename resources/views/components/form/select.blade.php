@props(['name', 'label', 'options', 'value'])

<x-form.field>
    <x-form.label :name="$name" :label="$label" />

    <select class="border border-gray-400 p-2 w-full" name="{{ $name }}" id="{{ $name }}">
        @foreach ($options as $option)
            <option value="{{ $option }}" {{ $value == $option ? 'selected' : '' }}>
                {{ ucfirst($option) }}
            </option>
        @endforeach
    </select>

    <x-form.error :name="$name" />
</x-form.field>
