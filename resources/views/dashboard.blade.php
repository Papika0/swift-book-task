<x-dashboard.layout>
    <div id="content" class="bg-white/10 col-span-9 rounded-lg p-6">
        <h1 class="font-bold py-4 uppercase">Books and Authors Statistics</h1>
        <div id="stats" class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-slate-500 p-6 rounded-lg">
                <div class="flex flex-row space-x-4 items-center">
                    <img src="https://cdn-icons-png.flaticon.com/256/29/29302.png"
                        class="w-10 h-10 fill-current inline-block">
                    <p class="text-indigo-300 text-sm font-medium uppercase leading-4">Books</p>
                    <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                        {{ $booksCount }}
                    </p>
                </div>
            </div>
            <div class="bg-slate-500 p-6 rounded-lg">
                <div class="flex flex-row space-x-4 items-center">
                    <img src="https://cdn-icons-png.flaticon.com/256/1948/1948164.png"
                        class="w-10 h-10 fill-current inline-block">
                    <p class="text-indigo-300 text-sm font-medium uppercase leading-4">Authors</p>
                    <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                        {{ $authorsCount }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.layout>
