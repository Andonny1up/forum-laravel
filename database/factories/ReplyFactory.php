<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'thread_id' => rand(1,200),
            'user_id' => rand(1,10),
            'body' => $this->faker->text()

        ];
    }
}
