<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tags = [
            'Messi',
            'Ronaldo',
            'Neymar',
            'Mbappe',
            'Laravel',
            'React',
            'Vue',
            'Angular',
            'Chicas',
            'Figma',
            'C#',
            'PHP',
            'Risas',
            'Divertido',
            'Viral'
        ];

        return [
            'name' => fake()->unique()->randomElement($tags),
        ];
    }
}
