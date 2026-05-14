<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request, Hotel $hotel)
    {
        $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in'
        ]);

        $bentrok = Booking::where('hotel_id', $hotel->id)
            ->where(function ($query) use ($request) {

                $query->where('check_in', '<', $request->check_out)
                    ->where('check_out', '>', $request->check_in);

            })->exists();

        if ($bentrok) {

            return back()->with(
                'error',
                'Tanggal booking bentrok!'
            );
        }

        Booking::create([
            'user_id' => auth()->id(),
            'hotel_id' => $hotel->id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'status' => 'success'
        ]);

        return back()->with(
            'success',
            'Booking berhasil!'
        );
    }

    public function myBooking()
    {
        $bookings = Booking::with('hotel')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view(
            'booking.my-booking',
            compact('bookings')
        );
    }
}