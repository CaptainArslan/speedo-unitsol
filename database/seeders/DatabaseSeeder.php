<?php

namespace Database\Seeders;

use App\Models\TermBaseBooking;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            // UserSeeder::class,
            TimingSeeder::class,
            NationalitySeeder::class,
            DaySeeder::class,
            PermissionSeeder::class,
            AdminUsersSeeder::class,
            SettingSeeder::class,
            VenueSeeder::class,
            ClassTypeSeeder::class,
            AssetTypeSeeder::class,
            ClassSeeder::class,
            ProductSeeder::class,
            TermBaseBookingSeeder::class,
            CountrySeeder::class,
        ]);
        // $user=User::find(1);
        // $user->roles()->attach(1);
        
        // $user->assignRole(1);
    }
}
