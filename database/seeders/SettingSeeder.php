<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
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
                'business_name' => 'Speedo Swim Sqad',
                'copyright' => '© 2022 SwimmingPoolMS.',
            ],

        ];
        foreach ($data as $setting) {
            Setting::create($setting);
        }
    }
}
