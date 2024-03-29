<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        return [
          'fullname' => $this->faker->name,
          'gender' => $this->faker->numberBetween(1,2),
          'email' => $this->faker->safeEmail,
          'postcode' => $this->faker->postcode,
          'address' => $this->faker->format('fullAddress'),
          'building_name' => $this->faker->secondaryAddress(),
          'opinion' => $this->faker->realText(100),
        ];
    }
}
