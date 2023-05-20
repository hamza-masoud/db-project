<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place_Service>
 */
class PlaceServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'value'=>$this->faker->words(2),
            'details'=>$this->faker->text(180),
            'service_id'=>$this->faker->randomDigit(),
            'place_id'=>$this->faker->randomDigit(),
        ];
    }
}
