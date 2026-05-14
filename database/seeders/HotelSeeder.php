<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    public function run(): void
    {
        Hotel::create([
            'name' => 'Hotel Sakura',
            'city' => 'Jakarta',
            'star' => 5,
            'description' => 'Hotel mewah pastel',
            'price' => 500000,
            'image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945',
        ]);

        Hotel::create([
            'name' => 'Hotel Lavender',
            'city' => 'Bandung',
            'star' => 3,
            'description' => 'Nyaman dan aesthetic',
            'price' => 250000,
            'image' => 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267',
        ]);
    }
}