<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publication>
 */
class PublicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Publication::class;

    public function definition(): array
    {
        return [
            'pub_name' => $this->faker->sentence(2),
            'author_id' => User::where('role', 'author')->inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            // 'cover_picture' => 'default-cover.jpg',
            'cover_picture' => $this->faker->image('public/uploads/covers', 400, 300, null, false),
            'isbn' => $this->faker->isbn13(),
            'published_date' => $this->faker->date(),
            'description' => $this->faker->paragraphs(5, true),
        ];

        // 'author_id' => User::factory(),
        // 'category_id' => Category::factory()
    }
}
