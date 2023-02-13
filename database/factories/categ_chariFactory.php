<?php

namespace Database\Factories;

use App\Models\category;
use App\Models\charity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\categ_chari>
 */
class categ_chariFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id'=>category::factory(),
            'charity_id'=>charity::factory()

        ];
    }
}
