<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\User;

 class UserFactory extends Factory
{
     protected $model = User::class;
     public function definition()
     {
    return [ 'mail_address' => $this->faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'name' => $this->faker->name,
        'address' => 'Hà Nội',
        'phone' => $this->faker->numerify('##########'),
        'remember_token' => Str::random(10), ];
  }
}
