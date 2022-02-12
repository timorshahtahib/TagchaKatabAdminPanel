<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'body' => $this->faker->text(),
            'download_link' => $this->faker->url(),
            'image_link' => $this->faker->url(),
            'sub_category_id' => rand(1,24),
            'is_hot' => rand(0,1),
            'author_id' => rand(2,4),
            'another_language' => 0,
            'language' => $this->faker->languageCode(),
            'another_language_text' => $this->faker->languageCode(),
            'size' => 202,
            'user_id' => 1,
            'page' => rand(100,500),


        ];
    }
}
