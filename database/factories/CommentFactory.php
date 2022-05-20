<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'post_id' => $this->faker->numberBetween(1, 5),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'website' => $this->faker->optional()->url,
            'comment' => $this->faker->paragraph,

        ];
    }
}
