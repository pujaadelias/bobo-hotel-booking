<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name',
        'city',
        'star',
        'description',
        'price',
        'image'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // TOTAL BOOKING
    public function totalBooking()
    {
        return $this->bookings()->count();
    }
}