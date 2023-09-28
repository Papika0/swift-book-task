<x-layout>

    <body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">

        <body class="antialiased">
            <div id="view" class="h-full w-screen flex flex-row">
                <div id="sidebar"
                    class="bg-white h-screen md:block shadow-xl px-3 w-30 md:w-60 lg:w-60 overflow-x-hidden transition-transform duration-300 ease-in-out">
                    <div class="space-y-6 md:space-y-10 mt-10">
                        <h1 class="font-bold text-4xl text-center md:hidden">
                            <span class="text-teal-600">.</span>
                        </h1>
                        <a href="{{ route('dashboard') }}"
                            class="hidden md:block font-bold text-sm md:text-xl text-center cursor-pointer">
                            Dashboard</span>
                        </a>
                        <div id="profile" class="space-y-3">
                            <img src="https://cdn-icons-png.flaticon.com/256/560/560260.png" alt="Avatar user"
                                class="w-10 md:w-16 rounded-full mx-auto" />
                            <div>
                                <h2 class="font-medium text-xs md:text-sm text-center text-teal-500">
                                    {{ auth()->user()->name }}
                                </h2>
                                <p class="text-xs text-gray-500 text-center">Administrator</p>
                            </div>
                        </div>
                        <div id="menu" class="flex flex-col space-y-2">
                            <a href="{{ route('books.index') }}"
                                class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:text-base rounded-md transition duration-150 ease-in-out">
                                <img src="https://cdn-icons-png.flaticon.com/256/29/29302.png"
                                    class="w-6 h-6 fill-current inline-block">
                                <span class="">Books</span>
                            </a>
                            <a href="{{ route('books.create') }}"
                                class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:text-base rounded-md transition duration-150 ease-in-out">
                                <img src="https://cdn-icons-png.flaticon.com/256/1828/1828757.png"
                                    class="w-6 h-6 fill-current inline-block">
                                <span class="">Add Book</span>
                            </a>
                            <a href="{{ route('authors.index') }}"
                                class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                                <img src="https://cdn-icons-png.flaticon.com/256/1948/1948164.png"
                                    class="w-6 h-6 fill-current inline-block">
                                <span class="">Authors</span>
                            </a>
                            <a href="{{ route('authors.create') }}"
                                class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                                <img src="https://cdn-icons-png.flaticon.com/256/1828/1828757.png"
                                    class="w-6 h-6 fill-current inline-block">
                                <span class="">Add Author</span>
                            </a>
                            <a href="{{ route('logout') }}"
                                class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                                <img src="https://cdn-icons-png.flaticon.com/256/11820/11820531.png"
                                    class="w-6 h-6 fill-current inline-block">
                                <span class="">Log Out</span>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="overflow-auto w-full mx-10 rounded-md">
                    {{ $slot }}
                </div>
        </body>
    </body>
</x-layout>
