<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    User::factory()
    ->count(3)
    ->has(
        Post::factory()->count(rand(1, 5))
    ->has(
        Comment::factory()->count(rand(5, 10))
        )
 
    )
    ->create();

}
}
