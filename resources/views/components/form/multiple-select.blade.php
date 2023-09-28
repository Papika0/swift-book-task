@props(['name', 'label', 'options', 'value', 'maxItems' => 3])
<x-form.field>
    <x-form.label :name="$name" :label="$label" />
    <select class="selectpicker" multiple data-live-search="true" name="{{ $name }}[]">

        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" {{ in_array($optionValue, (array) $value) ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach

    </select>
    <x-form.error :name="$name" />
</x-form.field>
