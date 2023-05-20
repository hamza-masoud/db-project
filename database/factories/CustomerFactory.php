<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
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
            //
            'first_name'=>$this->faker->firstName,
            'last_name'=>$this->faker->lastName,
            'phone'=>$this->faker->phoneNumber,
            'birthday'=>$this->faker->date,
            'gender'=>$this->faker->randomElement(['Male','Fmale']),
            'email'=>$this->faker->email,
            'details'=>$this->faker->text(20),
            'photo'=>$this->faker->imageUrl,
            'password'=>$this->faker->password,
            'phone_type'=>$this->faker->randomElement(['iphone' , 'android']),
            'applecation_version'=>$this->faker->numberBetween(1,5),
            'status'=>$this->faker->boolean(50),
        ];
    }
}
