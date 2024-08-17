<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $categories = DB::table('categories')->pluck('id');
        $tags = DB::table('tags')->pluck('id');
        $imageNames = range(1, 30);

        for ($i = 0; $i < 30; $i++) {
            $duration = $faker->randomElement(['1 Week', '4 Days/ 3 Nights', '2 Weeks', '3 Days/ 2 Nights']);

            DB::table('packages')->insert([
                'name' => $faker->words(3, true),
                'time' => $duration,
                'image' => $imageNames[$i] . '.jpg',
                'category_id' => $faker->randomElement($categories),
                'tag_id' => $faker->randomElement($tags),
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 100, 10000),
                'view_count' => $faker->numberBetween(0, 1000),
                'tour_count' => $faker->numberBetween(0, 100),
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
