<?php

namespace Database\Seeders;

use App\Models\Venue;
use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timings = [
            [
                'user_id' => '1',
                'name' => ' Jinah Park',
                'google_map_location' => '122.332.2.2',
                'address'=>'GRW',
            ],
            [
                'user_id' => '1',
                'name' => 'Hosptial Complex',
                'google_map_location' => '121.352.2.2',
                'address'=>'LHR',
            ],
            [
                'user_id' => '1',
                'name' => 'Sports Acdemy',
                'google_map_location' => '102.632.2.2',
                'address'=>'FSA',
            ],


        ];
        foreach ($timings as $timing) {
            Venue::create($timing);
        }
    }
}
