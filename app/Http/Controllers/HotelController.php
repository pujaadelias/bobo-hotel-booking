<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::latest()->get();

        return view('welcome', compact('hotels'));
    }

    // ================= ADMIN DASHBOARD =================

    public function adminDashboard()
    {
        $hotels = Hotel::withCount('bookings')->latest()->get();

        $totalHotel = Hotel::count();

        $totalBooking = Booking::count();

        $totalUser = User::where('role', 'user')->count();

        $hotelTerlaris = Hotel::withCount('bookings')
            ->orderBy('bookings_count', 'DESC')
            ->first();

        return view('admin.dashboard', compact(
            'hotels',
            'totalHotel',
            'totalBooking',
            'totalUser',
            'hotelTerlaris'
        ));
    }

    public function create()
    {
        return view('admin.hotels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'star' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image'
        ]);

        $image = $request->file('image')
            ->store('hotels', 'public');

        Hotel::create([
            'name' => $request->name,
            'city' => $request->city,
            'star' => $request->star,
            'description' => $request->description,
            'price' => $request->price,
            'image' => '/storage/' . $image
        ]);

        return redirect('/admin/dashboard')
            ->with('success', 'Hotel berhasil ditambahkan');
    }

    public function edit(Hotel $hotel)
    {
        return view('admin.hotels.edit', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
    {
        $hotel->update($request->all());

        return redirect('/admin/dashboard')
            ->with('success', 'Hotel berhasil diupdate');
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return back()->with('success', 'Hotel berhasil dihapus');
    }
}