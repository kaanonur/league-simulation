<?php

namespace Database\Seeders;

use App\Models\Week;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            Week::insert([
                ['title' => '1st'],
                ['title' => '2nd'],
                ['title' => '3rd'],
                ['title' => '4th'],
                ['title' => '5th'],
                ['title' => '6th'],
            ]);
        });
    }
}
