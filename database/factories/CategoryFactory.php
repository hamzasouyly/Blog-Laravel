<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class CategoryFactory extends Factory
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
            'title' => 'Category 1',
            'slug' => str::slug($title),
            'body' => 'this is a body for the category 1 ',
            'image' => $this->faker->imageUrl(),
        ];
    }
}
