<?php

namespace Database\Factories;

use App\Enums\OwnerStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
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
            'name'=>$this->faker->name,
            'address'=>$this->faker->address,
            'gps'=>$this->faker->randomAscii,
            'price'=>$this->faker->randomNumber(),
            'description'=>$this->faker->text(195),
            'image'=>$this->faker->imageUrl,
            'status'=>$this->faker->randomElement(OwnerStatus::getValues()),
            'owner_id'=>$this->faker->randomDigit(),
            'category_id'=>$this->faker->randomDigit(),
            'governorate_id'=>$this->faker->randomDigit(),
        ];
    }
}
