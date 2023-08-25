<?php

namespace Database\Seeders;

use App\Models\AssetType;
use Illuminate\Database\Seeder;

class AssetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asset_types = [
            [
                'name' => 'Cloth',
                'user_id' => 1,
            ],
            [
                'name' => 'Shoes',
                'user_id' => 1,
            ], 

        ];
        foreach ($asset_types as $asset_type) {
            AssetType::create($asset_type);
        }
    }
}
