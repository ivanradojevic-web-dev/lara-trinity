<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'admin@example.com',
            'type' => 'admin',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
        ]);

        User::factory(10)->create();

        Post::factory(10)
            ->has(Comment::factory()->count(4), 'comments')
            ->create();

        News::factory(10)
            ->has(Comment::factory()->count(4), 'comments')
            ->create();    

        Reply::factory(40)->create();
    }
}
