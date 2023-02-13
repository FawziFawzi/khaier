<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\categ_chari;
use App\Models\category;
use App\Models\donation;
use App\Models\my_case;
use App\Models\social_links;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(10)->create();
         my_case::factory(10)->create();
         category::factory(5)->create();
         donation::factory(10)->create();
         categ_chari::factory(10)->create();
         social_links::factory(3)->create();

    }
}
