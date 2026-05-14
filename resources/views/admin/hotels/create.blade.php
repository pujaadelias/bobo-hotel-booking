<!DOCTYPE html>
<html>
<head>
    <title>Tambah Hotel</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-pink-100 to-purple-100 min-h-screen p-10">

<div class="max-w-2xl mx-auto bg-white p-10 rounded-3xl shadow-2xl">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-8">

        <h1 class="text-4xl font-bold text-pink-500">
            Tambah Hotel 🏨
        </h1>

        <a
            href="/admin/dashboard"
            class="text-purple-500 font-semibold hover:text-pink-500"
        >
            ← Back
        </a>

    </div>

    <form
        action="{{ route('hotels.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf

        <!-- NAMA -->
        <div class="mb-5">

            <label class="font-semibold">
                Nama Hotel
            </label>

            <input
                type="text"
                name="name"
                class="w-full p-4 rounded-2xl border mt-2"
                required
            >

        </div>

        <!-- KOTA -->
        <div class="mb-5">

            <label class="font-semibold">
                Kota
            </label>

            <input
                type="text"
                name="city"
                class="w-full p-4 rounded-2xl border mt-2"
                required
            >

        </div>

        <!-- STAR -->
        <div class="mb-5">

            <label class="font-semibold">
                Bintang
            </label>

            <input
                type="number"
                name="star"
                class="w-full p-4 rounded-2xl border mt-2"
                required
            >

        </div>

        <!-- PRICE -->
        <div class="mb-5">

            <label class="font-semibold">
                Harga per malam
            </label>

            <input
                type="number"
                name="price"
                class="w-full p-4 rounded-2xl border mt-2"
                required
            >

        </div>

        <!-- DESCRIPTION -->
        <div class="mb-5">

            <label class="font-semibold">
                Deskripsi
            </label>

            <textarea
                name="description"
                rows="5"
                class="w-full p-4 rounded-2xl border mt-2"
                required
            ></textarea>

        </div>

        <!-- IMAGE -->
        <div class="mb-8">

            <label class="font-semibold">
                Gambar Hotel
            </label>

            <input
                type="file"
                name="image"
                class="w-full p-4 rounded-2xl border mt-2 bg-white"
                required
            >

        </div>

        <!-- BUTTON -->
        <button
            class="w-full bg-gradient-to-r from-pink-400 to-purple-400 text-white py-4 rounded-2xl font-bold"
        >
            Simpan Hotel ✨
        </button>

    </form>

</div>

</body>
</html>