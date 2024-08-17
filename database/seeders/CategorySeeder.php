<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Paris',
            'New York City',
            'Tokyo',
            'Rome',
            'Dubai',
            'London',
            'Barcelona',
            'Sydney',
            'Cape Town',
            'Bangkok',
            'Amsterdam',
            'Rio de Janeiro',
            'Prague',
            'Venice',
            'Bali',
            'Hawaii',
            'Santorini',
            'Machu Picchu',
            'Kyoto',
            'Vienna',
            'Istanbul',
            'Florence',
            'Lisbon',
            'Seoul',
            'San Francisco',
            'Cairo',
            'Moscow',
            'Toronto',
            'Copenhagen',
            'Dublin'
        ];
        $imageNames = range(1, 30);
        foreach ($categories as $index => $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'image' => $imageNames[$index] . '.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
