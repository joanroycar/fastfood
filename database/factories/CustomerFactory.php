<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'phone'=>$this->faker->numerify('#########'),
            'street'=>$this->faker->streetName(),
            'number'=>$this->faker->buildingNumber(),
            'colony'=>$this->faker->word(5),
            'city'=>$this->faker->city(),
            'state'=>$this->faker->state(),
            'zipcode'=>$this->faker->postcode(),
            'country'=> Str::limit($this->faker->country(), 49) //50

        ];
    }
}
