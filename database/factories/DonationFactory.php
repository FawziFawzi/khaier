<?php

namespace Database\Factories;

use App\Models\my_case;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\donation>
 */
class DonationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'quantity'=>'5 bags here',
            'pickup_address'=>$this->faker->address(),
            'pickup_time'=>$this->faker->time(),
            'pickup_date'=>$this->faker->date(),
            'status'=>rand(0,2),
            'my_case_id'=>my_case::factory(),
            'user_id'=>User::factory()
        ];
    }
}
