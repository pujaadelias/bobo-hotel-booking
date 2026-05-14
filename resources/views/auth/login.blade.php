<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-pink-100 via-rose-100 to-purple-100 px-5">

        <div class="w-full max-w-md bg-white/60 backdrop-blur-xl rounded-[35px] shadow-2xl p-10 border border-white/40">

            <!-- LOGO -->
            <div class="text-center mb-8">

                <h1 class="text-5xl font-extrabold text-pink-500">
                    💤 Bobo
                </h1>

                <p class="text-gray-500 mt-3">
                    Login untuk booking hotel favoritmu 💖
                </p>

            </div>

            <!-- SESSION STATUS -->
            <x-auth-session-status
                class="mb-4"
                :status="session('status')"
            />

            <!-- VALIDATION -->
            <x-input-error :messages="$errors->all()" class="mb-4" />

            <form method="POST" action="{{ route('login') }}">

                @csrf

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
                        autofocus
                        autocomplete="username"
                        class="w-full rounded-2xl border-0 bg-white/70 p-4 focus:ring-2 focus:ring-pink-300"
                    >

                </div>

                <!-- PASSWORD -->
                <div class="mb-6">

                    <label class="block text-gray-700 font-semibold mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        class="w-full rounded-2xl border-0 bg-white/70 p-4 focus:ring-2 focus:ring-purple-300"
                    >

                </div>

                <!-- REMEMBER -->
                <div class="flex items-center mb-6">

                    <input
                        type="checkbox"
                        name="remember"
                        class="rounded border-gray-300 text-pink-500 shadow-sm focus:ring-pink-300"
                    >

                    <span class="ml-2 text-gray-600">
                        Remember me
                    </span>

                </div>

                <!-- BUTTON -->
                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-pink-400 to-purple-400 hover:from-pink-500 hover:to-purple-500 text-white font-bold py-4 rounded-2xl shadow-xl transition hover:scale-105"
                >
                    Login ✨
                </button>

                <p class="text-center mt-6 text-gray-500">

                    Belum punya akun?

                    <a
                        href="{{ route('register') }}"
                        class="text-pink-500 font-semibold"
                    >
                        Register
                    </a>

                </p>

            </form>

        </div>

    </div>

</x-guest-layout>