<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HotelTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_hotels_can_be_accessed(): void
    {
        $response = $this->get('/api/hotels');

        $response->assertStatus(200);
    }
}