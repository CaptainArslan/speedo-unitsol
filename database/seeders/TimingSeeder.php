<?php

namespace Database\Seeders;

use App\Models\Timing;
use Illuminate\Database\Seeder;

class TimingSeeder extends Seeder
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
                'name' => 'Morning',
                'start_time'=>'9:00',
                'end_time'=>'9:30'
            ],
            [
                'user_id' => '1',
                'name' => 'Evening',
                'start_time'=>'19:00',
                'end_time'=>'23:30'
            ],
            [
                'user_id' => '1',
                'name' => 'Afternoon',
                'start_time'=>'14:00',
                'end_time'=>'16:30'
            ],

        ];
        foreach ($timings as $timing) {
            Timing::create($timing);
        }
    }
}
