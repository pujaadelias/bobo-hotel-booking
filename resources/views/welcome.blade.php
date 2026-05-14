<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bobo - Hotel Booking</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        body {
            font-family: 'Poppins', sans-serif;
        }

        .glass {
            background: rgba(255,255,255,0.55);
            backdrop-filter: blur(12px);
        }

    </style>

</head>

<body class="bg-gradient-to-br from-pink-100 via-rose-100 to-purple-100 min-h-screen">

<div class="max-w-7xl mx-auto px-5 py-8">

    <!-- NAVBAR -->
    <div class="glass rounded-3xl px-6 py-5 flex flex-col md:flex-row justify-between items-center shadow-xl mb-10 border border-white/40">

        <!-- LOGO -->
        <div>

            <h1 class="text-4xl md:text-5xl font-extrabold text-pink-500">
                💤 Bobo
            </h1>

            <p class="text-gray-500 mt-1">
                Hotel booking pastel aesthetic
            </p>

        </div>

        <!-- RIGHT -->
        <div class="flex items-center gap-5 mt-5 md:mt-0">

            @auth

                <!-- PROFILE -->
                <div class="text-right">

                    <p class="font-bold text-gray-700">
                        {{ auth()->user()->name }}
                    </p>

                    <p class="text-sm text-gray-500">
                        {{ auth()->user()->email }}
                    </p>

                    <p class="text-xs text-pink-500 font-semibold uppercase">
                        {{ auth()->user()->role }}
                    </p>

                </div>

                <!-- MENU -->
                <div class="flex gap-4 items-center">

                    {{-- ADMIN --}}
                    @if(auth()->user()->role == 'admin')

                        <a
                            href="/admin/dashboard"
                            class="text-purple-500 font-semibold hover:text-pink-500 transition"
                        >
                            Insight Dashboard
                        </a>

                    {{-- USER --}}
                    @else

                        <a
                            href="/my-booking"
                            class="text-pink-500 font-semibold hover:text-purple-500 transition"
                        >
                            My Booking
                        </a>

                    @endif

                    <!-- LOGOUT -->
                    <form
                        action="/logout"
                        method="POST"
                    >
                        @csrf

                        <button
                            class="text-red-400 font-semibold hover:text-red-600 transition"
                        >
                            Logout
                        </button>

                    </form>

                </div>

            @else

                <!-- GUEST -->
                <div class="flex gap-5">

                    <a
                        href="/login"
                        class="text-pink-500 font-semibold hover:text-purple-500 transition"
                    >
                        Login
                    </a>

                    <a
                        href="/register"
                        class="text-purple-500 font-semibold hover:text-pink-500 transition"
                    >
                        Register
                    </a>

                </div>

            @endauth

        </div>

    </div>

    <!-- HERO -->
    <div class="text-center mb-14">

        <h2 class="text-5xl md:text-6xl font-extrabold text-gray-800 leading-tight">

            Temukan Hotel <br>

            Senyaman Rumah 🛏️

        </h2>

        <p class="text-gray-500 mt-5 text-lg max-w-2xl mx-auto">

            Booking hotel cepat, cantik, dan nyaman dengan nuansa pastel aesthetic.

        </p>

    </div>

    <!-- HOTEL GRID -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

        @foreach ($hotels as $hotel)

        <div class="glass rounded-[35px] overflow-hidden shadow-2xl border border-white/40 hover:-translate-y-2 transition duration-300">

            <!-- IMAGE -->
            <div class="relative">

                <img
                    src="{{ $hotel->image ? $hotel->image : 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1200&auto=format&fit=crop' }}"
                    class="w-full h-64 object-cover"
                >

                <!-- STAR -->
                <div class="absolute top-4 right-4 bg-white/80 backdrop-blur-md px-4 py-2 rounded-full text-yellow-500 font-semibold shadow">

                    ⭐ {{ $hotel->star }}

                </div>

            </div>

            <!-- CONTENT -->
            <div class="p-6">

                <!-- NAME -->
                <h2 class="text-2xl font-bold text-gray-800">
                    {{ $hotel->name }}
                </h2>

                <!-- CITY -->
                <p class="text-gray-500 mt-1">
                    📍 {{ $hotel->city }}
                </p>

                <!-- DESCRIPTION -->
                <p class="text-gray-600 mt-4 leading-relaxed">
                    {{ $hotel->description }}
                </p>

                <!-- PRICE -->
                <div class="mt-6">

                    <p class="text-sm text-gray-400">
                        Harga per malam
                    </p>

                    <h3 class="text-3xl font-extrabold text-pink-500">

                        Rp {{ number_format($hotel->price) }}

                    </h3>

                </div>

                @auth

                <!-- FORM BOOKING -->
                <form
                    action="{{ route('booking.store', $hotel->id) }}"
                    method="POST"
                    class="mt-6"
                >

                    @csrf

                    <div class="space-y-3">

                        <!-- CHECK IN -->
                        <input
                            type="date"
                            name="check_in"
                            id="checkin-{{ $hotel->id }}"
                            onchange="hitungTotal({{ $hotel->id }}, {{ $hotel->price }})"
                            class="w-full rounded-2xl border-0 bg-white/70 p-4"
                            required
                        >

                        <!-- CHECK OUT -->
                        <input
                            type="date"
                            name="check_out"
                            id="checkout-{{ $hotel->id }}"
                            onchange="hitungTotal({{ $hotel->id }}, {{ $hotel->price }})"
                            class="w-full rounded-2xl border-0 bg-white/70 p-4"
                            required
                        >

                    </div>

                    <!-- TOTAL -->
                    <div
                        id="total-{{ $hotel->id }}"
                        class="mt-4 bg-pink-50 text-pink-500 p-4 rounded-2xl font-bold text-lg"
                    >
                        Total: Rp 0
                    </div>

                    <!-- BUTTON -->
                    <button
                        class="mt-5 w-full bg-gradient-to-r from-pink-400 to-purple-400 hover:from-pink-500 hover:to-purple-500 text-white font-bold py-4 rounded-2xl shadow-xl transition hover:scale-105"
                    >

                        Booking Sekarang ✨

                    </button>

                </form>

                @else

                <!-- LOGIN BUTTON -->
                <a
                    href="/login"
                    class="mt-6 inline-block w-full text-center bg-gradient-to-r from-pink-400 to-purple-400 text-white font-bold py-4 rounded-2xl"
                >
                    Login Dulu
                </a>

                @endauth

            </div>

        </div>

        @endforeach

    </div>

</div>

<!-- SCRIPT TOTAL -->
<script>

function hitungTotal(hotelId, harga)
{
    let checkin = document.getElementById(
        `checkin-${hotelId}`
    ).value;

    let checkout = document.getElementById(
        `checkout-${hotelId}`
    ).value;

    if(checkin && checkout)
    {
        let tanggalMasuk = new Date(checkin);

        let tanggalKeluar = new Date(checkout);

        let selisihHari = (
            tanggalKeluar - tanggalMasuk
        ) / (1000 * 60 * 60 * 24);

        if(selisihHari > 0)
        {
            let total = selisihHari * harga;

            document.getElementById(
                `total-${hotelId}`
            ).innerHTML =
                `Total: Rp ${total.toLocaleString('id-ID')}`;
        }
    }
}

</script>

</body>
</html>