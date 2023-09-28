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
                        <h1 class="hidden md:block font-bold text-sm md:text-xl text-center">
                            Dashboard<span class="text-teal-600">.</span>
                        </h1>
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
                        <div class="flex border-2 border-gray-200 rounded-md focus-within:ring-2 ring-teal-500">
                            <input type="text"
                                class="w-full rounded-tl-md rounded-bl-md px-2 py-3 text-sm text-gray-600 focus:outline-none"
                                placeholder="Search Book" />
                            <button class="rounded-tr-md rounded-br-md px-2 py-3 hidden md:block">
                                <svg class="w-4 h-4 fill-current" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <div id="menu" class="flex flex-col space-y-2">
                            <a href=""
                                class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:text-base rounded-md transition duration-150 ease-in-out">
                                <img src="https://cdn-icons-png.flaticon.com/256/29/29302.png"
                                    class="w-6 h-6 fill-current inline-block">
                                <span class="">Books</span>
                            </a>
                            <a href=""
                                class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                                <img src="https://cdn-icons-png.flaticon.com/256/1948/1948164.png"
                                    class="w-6 h-6 fill-current inline-block">
                                <span class="">Authors</span>
                            </a>
                            <a href=""
                                class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                                <img src="https://cdn-icons-png.flaticon.com/256/11820/11820531.png"
                                    class="w-6 h-6 fill-current inline-block">
                                <span class="">Log Out</span>
                            </a>

                        </div>
                    </div>
                </div>
                {{ $slot }}
        </body>
    </body>
</x-layout>
