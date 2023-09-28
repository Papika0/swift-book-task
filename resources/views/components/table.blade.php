@props(['data', 'type'])

<table class="divide-y divide-gray-500 overflow-auto">
    <thead class="bg-gray-400">
        <tr>
            <th class="px-6 py-3 text-middle text-xs font-medium text-gray-700 uppercase tracking-wider">
                Author
            </th>
            @if ($type === 'books')
                <th class="px-6 py-3 text-middle text-xs font-medium text-gray-700 uppercase tracking-wider">
                    Title
                </th>
                <th class="px-6 py-3 text-middle text-xs font-medium text-gray-700 uppercase tracking-wider">
                    Year of Publication
                </th>
                <th class="px-6 py-3 text-middle text-xs font-medium text-gray-700 uppercase tracking-wider">
                    Status
                </th>
            @elseif ($type === 'authors')
                <th class="px-6 py-3 text-middle text-xs font-medium text-gray-700 uppercase tracking-wider">
                    Books Count
                </th>
            @endif
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-700 uppercase tracking-wider">
                Edit
            </th>
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-700 uppercase tracking-wider">
                Delete
            </th>
        </tr>
    </thead>
    <tbody class="bg-gray-200 divide-y divide-gray-500 overflow-auto">
        @foreach ($data as $item)
            <tr>
                @if ($type === 'authors')
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a class="text-sm font-medium text-gray-900">{{ $item->name }}</a>
                    </td>
                @else
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a
                            class="text-sm font-medium text-gray-900">{{ collect(json_decode($item->authors, true))->pluck('name')->implode(', ') }}</a>
                    </td>
                @endif

                @if ($type === 'books')
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a class="text-sm font-medium text-gray-900">{{ $item->title }}</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a class="text-sm font-medium text-gray-900">{{ $item->publication_year }}</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a class="text-sm font-medium text-gray-900">{{ $item->status }}</a>
                    </td>
                @endif

                @if ($type === 'authors')
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a class="text-sm font-medium text-gray-900">{{ $item->books->count() }}</a>
                    </td>
                @endif


                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route($type . '.edit', $item->id) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <form method="POST" action="{{ route($type . '.destroy', $item->id) }}">
                        @csrf
                        @method('DELETE')

                        <button class="text-xs text-gray-400">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
