<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-pink-100 to-purple-100 min-h-screen p-10">

<div class="max-w-7xl mx-auto">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-10">

        <div>

            <h1 class="text-5xl font-extrabold text-pink-500">
                Admin Dashboard 💖
            </h1>

            <p class="text-gray-500 mt-2">
                Welcome, {{ auth()->user()->name }}
            </p>

        </div>

        <div class="flex gap-3">

            <a
                href="/hotels/create"
                class="bg-pink-500 text-white px-5 py-3 rounded-2xl"
            >
                + Tambah Hotel
            </a>

            <form action="/logout" method="POST">
                @csrf

                <button class="bg-gray-700 text-white px-5 py-3 rounded-2xl">
                    Logout
                </button>
            </form>

        </div>

    </div>

    <!-- INSIGHT -->
    <div class="grid grid-cols-4 gap-5 mb-10">

        <div class="bg-white p-6 rounded-3xl shadow-xl">

            <h2 class="text-gray-500">
                Total Hotel
            </h2>

            <p class="text-4xl font-bold text-pink-500 mt-2">
                {{ $totalHotel }}
            </p>

        </div>

        <div class="bg-white p-6 rounded-3xl shadow-xl">

            <h2 class="text-gray-500">
                Total Booking
            </h2>

            <p class="text-4xl font-bold text-purple-500 mt-2">
                {{ $totalBooking }}
            </p>

        </div>

        <div class="bg-white p-6 rounded-3xl shadow-xl">

            <h2 class="text-gray-500">
                Total User
            </h2>

            <p class="text-4xl font-bold text-blue-500 mt-2">
                {{ $totalUser }}
            </p>

        </div>

        <div class="bg-white p-6 rounded-3xl shadow-xl">

            <h2 class="text-gray-500">
                Hotel Terlaris
            </h2>

            <p class="text-xl font-bold text-green-500 mt-2">
                {{ $hotelTerlaris?->name }}
            </p>

        </div>

    </div>

    <!-- HOTEL LIST -->
    <div class="grid md:grid-cols-3 gap-6">

        @foreach($hotels as $hotel)

        <div class="bg-white rounded-3xl overflow-hidden shadow-xl">

            <img
                src="{{ $hotel->image }}"
                class="w-full h-60 object-cover"
            >

            <div class="p-5">

                <h2 class="text-2xl font-bold">
                    {{ $hotel->name }}
                </h2>

                <p class="text-gray-500 mt-2">
                    {{ $hotel->city }}
                </p>

                <p class="text-pink-500 mt-2">
                    ⭐ {{ $hotel->star }}
                </p>

                <p class="mt-4 text-gray-600">
                    Booking:
                    {{ $hotel->bookings_count }}
                </p>

                <div class="flex gap-3 mt-5">

                    <a
                        href="/hotels/{{ $hotel->id }}/edit"
                        class="bg-yellow-400 text-white px-4 py-2 rounded-xl"
                    >
                        Edit
                    </a>

                    <form
                        action="/hotels/{{ $hotel->id }}"
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            class="bg-red-500 text-white px-4 py-2 rounded-xl"
                        >
                            Delete
                        </button>

                    </form>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

</body>
</html>