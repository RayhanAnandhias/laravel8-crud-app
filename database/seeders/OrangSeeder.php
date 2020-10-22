<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrangModel;

class OrangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrangModel::factory()->times(100)->create();
    }
}
