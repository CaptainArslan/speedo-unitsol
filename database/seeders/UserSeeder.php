<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'first_name' => 'dhfopdaf',
            'middle_name' => 'dhfopdaf',
            'last_name' => 'dhfopdaf',
            'email' => 'admin43@gmail.com',
            'password' => bcrypt('11223344'),
            'is_admin' => true,
                'country_code' => '+971',
            ],

        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
