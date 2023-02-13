<?php

namespace Database\Factories;

use App\Models\charity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\social_links>
 */
class social_linksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'charity_id'=>charity::factory(),
            'name'=>$this->faker->domainWord(),
            'link'=>$this->faker->domainName()
        ];
    }
}
