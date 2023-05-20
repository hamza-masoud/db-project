<?php

namespace Database\Factories;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
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
            'description'=>$this->faker->text(185),
            'icon'=>$this->faker->imageUrl(),
            'status'=>$this->faker->randomElement(Status::getValues()),
            'attribute'=>$this->faker->seed(''),
            'category_id'=>$this->faker->randomDigit(),
        ];
    }
}
