<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create(
            [
                'name' => 'Steven Ulloa',
                'email' => 'steven@gmail.com',
                'password' => bcrypt('steven@gmail.com')
            ],
        );

        User::factory()->create(
            [
                'name' => 'Limber Rodriguez',
                'email' => 'limber@gmail.com',
                'password' => bcrypt('limber@gmail.com')
            ],
        );

        Category::factory(8)->create();
        Tag::factory(15)->create();
    }
}
