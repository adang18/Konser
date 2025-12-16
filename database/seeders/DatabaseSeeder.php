<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Concert;
use App\Models\TicketCategory;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $concert = Concert::create([
            'title' => 'Dewa 19 Live Concert',
            'artist' => 'Ahmad Dhani',
            'date' => '2025-12-30',
            'location' => 'Jakarta Convention Center',
            'description' => 'Konser spektakuler akhir tahun.'
        ]);

        TicketCategory::create([
            'concert_id' => $concert->id,
            'name' => 'VIP',
            'price' => 750000,
            'stock' => 100
        ]);

        TicketCategory::create([
            'concert_id' => $concert->id,
            'name' => 'Regular',
            'price' => 250000,
            'stock' => 300
        ]);
    }
}
