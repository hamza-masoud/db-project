<?php

namespace Database\Factories;

use App\Enums\OwnerStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tutor>
 */
class OwnerFactory extends Factory
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
            'phone'=>$this->faker->phoneNumber,
            'email'=>$this->faker->email,
            'details'=>$this->faker->text(100),
            'password'=>$this->faker->password,
            'status'=>$this->faker->randomElement(OwnerStatus::getValues()),
        ];
    }
}
