<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $absolutePath = $this->faker->image('storage/app/public/images', 640, 480, 'cats', true);

        return [
            'txt' => $this->faker->realTextBetween($minNbChars = 500, $maxNbChars = 2000),
            'img_path' => function () {
                $absolutePath = fake()->image(storage_path('app/public/images'), 640, 480, 'cats', true);

                return str_replace(storage_path('app/public/'), '', $absolutePath);
            },

            'published_at' => $this->faker->dateTimeBetween('-2 months', '+1 month'),
            'user_id' => User::all()->random()->id,
        ];
    }
}
