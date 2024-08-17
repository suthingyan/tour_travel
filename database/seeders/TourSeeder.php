<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $imageNames = range(1, 20);
        for ($i = 0; $i < 20; $i++) {
            DB::table('tours')->insert([
                'name' => $faker->company,
                'image' => $imageNames[$i] . '.jpg',
                'phone_no' => $faker->phoneNumber,
                'facebook_link' => $faker->url,
                'twitter_link' => $faker->url,
                'instagram_link' => $faker->url,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}