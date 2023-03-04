<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


class BookFactory extends Factory
{

    protected $model = Book::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'auth_id' => $this->faker->numberBetween(1, 100),
            'cat_id' => $this->faker->numberBetween(1,300)
            // 'auth_id' => function () {
            //     if ($auth = Author::inRandomOrder()->first()) {
            //         return $auth->id;
            //     }

            //     return factory(Author::class)->create()->id;
            // },
            // 'cat_id' => function () {
            //     if ($category = Category::inRandomOrder()->first()) {
            //         return $category->id;
            //     }

            //     return factory(Category::class)->create()->id;
            // },

        ];
    }
}
