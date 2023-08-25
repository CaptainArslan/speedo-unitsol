<?php

namespace Database\Seeders;

use App\Models\SwimmingClass;
use App\Models\Timing;
use App\Models\User;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            [
                'name' => 'Child Swimming',
                'user_id' => User::first()->id,
                'age_group' => 'Pool',
                'color' => "#44e817",
                'no_of_student' => 5,
                'price' => 500,
                // 'price' => rand(100,4000),

            ],
            [
                'name' => 'Adult Swimming',
                'user_id' => User::first()->id,
                'age_group' => 'Pool',
                'color' => '#11d0cc',
                'no_of_student' => 10,
                'price' => 200,
                // 'price' => rand(100,4000),

            ],

        ];
        foreach ($classes as $class) {
            SwimmingClass::create($class);
        }
    }
}
