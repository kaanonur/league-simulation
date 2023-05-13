<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
           Team::insert([
               ['name' => 'Manchester City', 'power' => 90],
               ['name' => 'Arsenal', 'power' => 70],
               ['name' => 'Liverpool', 'power' => 80],
               ['name' => 'Chelsea', 'power' => 70]
           ]);
        });
    }
}
