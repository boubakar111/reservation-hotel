<?php

namespace Database\Seeders;

use App\Models\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // array of specific hotels to populate database
        $hotels = [
            [
                'name' => 'Marriott',
                'location' => 'Seattle, WA',
                'description' => 'International luxurious hotel.',
                'image' => 'https://placeimg.com/640/480/arch'
            ],
            [
                'name' => 'Aria',
                'location' => 'Las Vegas, NV',
                'description' => 'International luxurious hotel.',
                'image' => 'https://placeimg.com/640/480/arch'
            ],
            [
                'name' => 'MGM Grand',
                'location' => 'Las Vegas, NV',
                'description' => 'International luxurious hotel.',
                'image' => 'https://placeimg.com/640/480/arch'
            ]
        ];

        foreach ($hotels as $hotel) {
            Hotel::create(array(
                'name' => $hotel['name'],
                'location' => $hotel['location'],
                'description' => $hotel['description'],
                'image' => $hotel['image']
            ));
        }
    }
}
