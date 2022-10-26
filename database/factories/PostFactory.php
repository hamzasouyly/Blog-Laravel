<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
        $title = $this->faker->realText(20);

        return [
            //
            'title' => $title,
            'slug' => str::slug($title),
            'body' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
