<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->sentence(mt_rand(2,5)),
            'slug' => $this->faker->slug(),
            'isi' => $this->faker->sentence(mt_rand(10,15)),
            'user_id' => mt_rand(4,13),
            'status_id' => mt_rand(1,4)
        ];
    }
}
