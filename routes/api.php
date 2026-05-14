<?php

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// =======================
// GET ALL HOTEL
// =======================
Route::get('/hotels', function () {

    return response()->json([

        'success' => true,

        'message' => 'Data hotel berhasil diambil',

        'data' => Hotel::all()

    ]);

});

// =======================
// CREATE HOTEL
// =======================
Route::post('/hotels', function (Request $request) {

    $hotel = Hotel::create([

        'name' => $request->name,
        'city' => $request->city,
        'star' => $request->star,
        'description' => $request->description,
        'price' => $request->price,
        'image' => $request->image,

    ]);

    return response()->json([

        'success' => true,

        'message' => 'Hotel berhasil ditambahkan',

        'data' => $hotel

    ]);

});

// =======================
// UPDATE HOTEL
// =======================
Route::put('/hotels/{id}', function (Request $request, $id) {

    $hotel = Hotel::find($id);

    if (!$hotel)
    {
        return response()->json([

            'success' => false,
            'message' => 'Hotel tidak ditemukan'

        ], 404);
    }

    $hotel->update([

        'name' => $request->name,
        'city' => $request->city,
        'star' => $request->star,
        'description' => $request->description,
        'price' => $request->price,
        'image' => $request->image,

    ]);

    return response()->json([

        'success' => true,

        'message' => 'Hotel berhasil diupdate',

        'data' => $hotel

    ]);

});

// =======================
// DELETE HOTEL
// =======================
Route::delete('/hotels/{id}', function ($id) {

    $hotel = Hotel::find($id);

    if (!$hotel)
    {
        return response()->json([

            'success' => false,
            'message' => 'Hotel tidak ditemukan'

        ], 404);
    }

    $hotel->delete();

    return response()->json([

        'success' => true,

        'message' => 'Hotel berhasil dihapus'

    ]);

});