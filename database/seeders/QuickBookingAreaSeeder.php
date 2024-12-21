<?php

namespace Database\Seeders;

use App\Models\QuickBookingArea;
use Illuminate\Database\Seeder;

class QuickBookingAreaSeeder extends Seeder
{
    public function run(): void
    {
        QuickBookingArea::firstOrCreate([
            'id' => 1,
        ],[
            'description' => "Atoli is one of the best resorts in the global market and that's why you will get a luxury life period on the global market. We always provide you a special support for all of our guests and that's will be the main reason to be the most popular.",
            'short_title' => 'MAKE A QUICK BOOKING',
            'main_title' => 'We Are the Best in All-time & So Please Get a Quick Booking',
            'button_text' => 'Quick Booking',
        ]);
    }
}
