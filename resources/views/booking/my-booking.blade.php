<!DOCTYPE html>
<html>
<head>
    <title>Bobo - My Booking</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-pink-100 via-rose-100 to-purple-100 min-h-screen p-5 md:p-10">

<div class="max-w-6xl mx-auto">

    <div class="flex flex-col md:flex-row justify-between items-center mb-10">

        <div>
            <h1 class="text-5xl font-extrabold text-pink-500">
                💤 My Booking
            </h1>

            <p class="text-gray-500 mt-2">
                Riwayat booking hotel kamu
            </p>
        </div>

        <a
            href="/"
            class="mt-5 md:mt-0 bg-white text-pink-500 px-6 py-3 rounded-2xl shadow-lg font-semibold hover:scale-105 transition"
        >
            ← Kembali
        </a>

    </div>

    <div class="overflow-x-auto bg-white/60 backdrop-blur-xl rounded-3xl shadow-2xl">

        <table class="w-full">

            <thead>

                <tr class="bg-gradient-to-r from-pink-400 to-purple-400 text-white">

                    <th class="p-5 text-left">Hotel</th>
                    <th class="p-5 text-left">Check In</th>
                    <th class="p-5 text-left">Check Out</th>
                    <th class="p-5 text-left">Status</th>

                </tr>

            </thead>

            <tbody>

                @foreach($bookings as $booking)

                <tr class="border-b border-pink-100 hover:bg-pink-50 transition">

                    <td class="p-5 font-semibold text-gray-700">
                        {{ $booking->hotel->name }}
                    </td>

                    <td class="p-5 text-gray-600">
                        {{ $booking->check_in }}
                    </td>

                    <td class="p-5 text-gray-600">
                        {{ $booking->check_out }}
                    </td>

                    <td class="p-5">

                        <span class="bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-semibold">
                            {{ $booking->status }}
                        </span>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</body>
</html>