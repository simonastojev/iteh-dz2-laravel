<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 100; $i++) {
            Comment::create([
                'username' => $faker->username,
                'text' => $faker->paragraph,
                'article_id' => rand(1, 20)
            ]);
        }

    }
}
