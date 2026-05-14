<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-pink-100 via-rose-100 to-purple-100 px-5">

        <div class="w-full max-w-md bg-white/60 backdrop-blur-xl rounded-[35px] shadow-2xl p-10 border border-white/40">

            <!-- LOGO -->
            <div class="text-center mb-8">

                <h1 class="text-5xl font-extrabold text-pink-500">
                    💤 Bobo
                </h1>

                <p class="text-gray-500 mt-3">
                    Buat akun untuk mulai booking hotel aesthetic ✨
                </p>

            </div>

            <!-- VALIDATION -->
            <x-input-error :messages="$errors->all()" class="mb-4" />

            <form method="POST" action="{{ route('register') }}">

                @csrf

                <!-- NAME -->
                <div class="mb-5">

                    <label class="block text-gray-700 font-semibold mb-2">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        autocomplete="name"
                        class="w-full rounded-2xl border-0 bg-white/70 p-4 focus:ring-2 focus:ring-pink-300"
                    >

                </div>

                <!-- EMAIL -->
                <div class="mb-5">

                    <label class="block text-gray-700 font-semibold mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="username"
                        class="w-full rounded-2xl border-0 bg-white/70 p-4 focus:ring-2 focus:ring-pink-300"
                    >

                </div>

                <!-- PASSWORD -->
                <div class="mb-5">

                    <label class="block text-gray-700 font-semibold mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        class="w-full rounded-2xl border-0 bg-white/70 p-4 focus:ring-2 focus:ring-purple-300"
                    >

                </div>

                <!-- CONFIRM PASSWORD -->
                <div class="mb-8">

                    <label class="block text-gray-700 font-semibold mb-2">
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        class="w-full rounded-2xl border-0 bg-white/70 p-4 focus:ring-2 focus:ring-purple-300"
                    >

                </div>

                <!-- BUTTON -->
                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-pink-400 to-purple-400 hover:from-pink-500 hover:to-purple-500 text-white font-bold py-4 rounded-2xl shadow-xl transition hover:scale-105"
                >
                    Register ✨
                </button>

                <p class="text-center mt-6 text-gray-500">

                    Sudah punya akun?

                    <a
                        href="{{ route('login') }}"
                        class="text-pink-500 font-semibold"
                    >
                        Login
                    </a>

                </p>

            </form>

        </div>

    </div>

</x-guest-layout>