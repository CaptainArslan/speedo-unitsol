<?php

namespace Database\Seeders;

// use App\Models\Role;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class AdminUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = Role::first();
        // Create 3 admin users
        // for ($i = 1; $i <= 3; $i++) {
        $this->faker = Factory::create();
        $user = User::create([
            'first_name' => $this->faker->firstname(),
            'middle_name' => $this->faker->lastname(),
            'last_name' => $this->faker->lastname(),
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('adminadmin'),
            'is_admin' => true,
            'country_code' => '+971',

        ]);
        // $user_id = $user->id;
        $role=Role::where('name','Super Admin')->first();
        $permissions = Permission::all();
        $role->syncPermissions([]);
        foreach ($permissions as $key => $p) {
            $permission = Permission::find($key);
            if ($permission) {
                $role->givePermissionTo($permission);
            }
        }
        $user->assignRole(1);

        // }
        // Create trainer users
        for ($j = 1; $j <= 4; $j++) {
            $this->vendorFaker = Factory::create();
            $vendor = User::create([
                'first_name' => $this->vendorFaker->firstname(),
                'middle_name' => $this->vendorFaker->lastname(),
                'last_name' => $this->vendorFaker->lastname(),
                'email' => 'trainer' . $j . '@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'is_trainer' => true,
                'country_code' => '+971',
            ]);
            $vendor->roles()->attach(2);
        }

        // Create parent users
        for ($j = 1; $j <= 4; $j++) {
            $this->vendorFaker = Factory::create();
            $vendor = User::create([
                'first_name' => $this->vendorFaker->firstname(),
                'middle_name' => $this->vendorFaker->lastname(),
                'last_name' => $this->vendorFaker->lastname(),
                'email' => 'parent'.$j.'@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'country_code' => '+971',
            ]);
            $vendor->roles()->attach(3);
        }
    }
}
