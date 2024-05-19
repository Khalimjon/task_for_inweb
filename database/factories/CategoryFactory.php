<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'short_content' => $this->faker->sentence,
            'content' => $this->faker->text,
            'photo' => 'photos/' . $this->faker->image('storage/app/public/photos', 640, 480, null, false),
            'user_id' => User::factory(),
        ];
    }
}
