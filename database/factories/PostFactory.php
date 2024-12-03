<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *  $table->id();

     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => Str::random(4),
            'author_id'=> User::factory(),
            'slug' => Str::random(5),
            'body'  =>fake()->text()
        ];
    }
}
