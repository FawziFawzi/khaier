<?php

namespace Database\Seeders;

use App\Models\CharityBookmarks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CharityBookmarksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CharityBookmarks::factory()->count(19)->create();
    }
}
