<?php

namespace Database\Seeders;

// use App\Models\Role;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Super Admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Trainer',
                'guard_name' => 'Trainer'
            ],
            [
                'name' => 'Parent',
                'guard_name' => 'Parent'
            ]
        ];
        Role::insert($data);
    }
}
