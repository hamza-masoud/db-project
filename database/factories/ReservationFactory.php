<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
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
            'time'=>$this->faker->randomElement(['morning','evning']),
            'price'=>$this->faker->randomNumber(3),
            'startDate'=>$this->faker->dateTime(),
            'endDate'=>$this->faker->dateTime(),
            'place_id'=>$this->faker->randomDigit(),
        ];
    }
}
