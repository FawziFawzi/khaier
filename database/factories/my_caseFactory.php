<?php

namespace Database\Factories;

use App\Models\charity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\my_case>
 */
class my_caseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->title(),
            'excerpt'=>$this->faker->paragraph(1),
            'max_amount'=>random_int(5000,7000),
            'collected_amount'=>random_int(1000,3000),
            'priority'=>random_int(1,5),
            'category'=>$this->faker->word(),
            'thumbnail'=>$this->faker->image(),
            'charity_id'=>charity::factory()
        ];
    }
}
