<?php

namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Seeder;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class_types = [
            [
                'name' => 'Once a Week',
                'class_occurrence'=>1,
                'user_id' => 1,
            ],[
                'name' => '4 Week Class',
                'class_occurrence'=>4,
                'user_id' => 1,
            ], [
                'name' => '2 Week Class',
                'class_occurrence' => 2,
                'user_id' => 1,
            ],

        ];
        foreach ($class_types as $class_type) {
            ClassType::create($class_type);
        }
    }
}
