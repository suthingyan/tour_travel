<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Adventure Tours',
            'City Tours',
            'Cultural Tours',
            'Beach Vacations',
            'Cruise Packages',
            'Eco Tours',
            'Family Vacations',
            'Group Tours',
            'Honeymoon Packages',
            'Luxury Tours',
            'Nature Tours',
            'Religious Tours',
            'Road Trips',
            'Safari Tours',
            'Sightseeing Tours',
            'Solo Travel',
            'Sports Tours',
            'Weekend Getaways',
            'Wildlife Tours',
            'Winter Sports Trips',
            'Yoga Retreats',
            'Historical Tours',
            'Island Tours',
            'Mountain Climbing',
            'Ski Trips',
            'Culinary Tours',
            'Wine Tours',
            'Photography Tours',
            'Train Journeys',
            'Volunteer Travel'
        ];

        foreach ($tags as $tag) {
            DB::table('tags')->insert([
                'name' => $tag,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}