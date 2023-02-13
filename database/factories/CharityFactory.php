<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\charity>
 */
class CharityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->unique()->company(),
            'address'=>$this->faker->address(),
            'phone_number'=>$this->faker->unique()->e164PhoneNumber(),
            'password'=>md5('password'),
            'email'=>$this->faker->unique()->companyEmail(),
            'email_verified_at'=>now(),
            'excerpt'=>$this->faker->paragraph(1),
            'thumbnail'=>'charity thumbnail here'


        ];
    }
}
