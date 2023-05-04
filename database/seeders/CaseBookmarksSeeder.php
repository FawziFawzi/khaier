<?php

namespace Database\Seeders;

use App\Models\MyCaseBookmarks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaseBookmarksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MyCaseBookmarks::factory()->count(10)->create();
    }
}
