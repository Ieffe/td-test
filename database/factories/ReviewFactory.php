<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\Review;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_id' => $this->faker->numberBetween(1, 10000),
            'rating' => $this->faker->numberBetween(1,10)
        ];
    }
}
