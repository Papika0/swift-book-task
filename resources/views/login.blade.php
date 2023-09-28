<x-layout>
    <section class="px-6 py-8 h-screen max-w-lg flex items-center mx-auto">
        <main class="w-full">
            <x-panel class="bg-gray-100">
                <h1 class="text-center font-bold text-xl">Log In!</h1>

                <form method="POST" action="{{ route('login') }}" class="mt-10">
                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username" required />
                    <x-form.input name="password" type="password" autocomplete="current-password" required />

                    <x-form.button>Log In</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
