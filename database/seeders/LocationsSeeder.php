<?php

namespace Database\Seeders;

use App\Models\Models\Location;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $location= [
            [
                'name' => 'boubakar',
                'description' => 'Gare du nord.',
            ],
            [
                'name' => 'Marseil',
                'description' => 'Gare Saint charles.',
            ],
            [
                'name' => 'Lyon',
                'description' => 'Gare Central.',
            ],
            [
                'name' => 'Lille',
                'description' => 'Gare Lille flandre.',
            ],
        ];

        foreach ($location as $loc) {
          Location::create(array(
                'name' => $loc['name'],
                'description' => $loc['description'],
            ));
        }
    }
}
