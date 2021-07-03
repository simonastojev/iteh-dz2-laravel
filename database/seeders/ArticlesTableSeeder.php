<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use joshtronic\LoremIpsum;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */



    public function run()
    {

       // Article::truncate();

        $faker = \Faker\Factory::create();
        $lipsum = new LoremIpsum();

        for($i = 0; $i < 20; $i++) {
            Article::create([
                'title' => $faker->sentence,
                'body' => $lipsum->paragraphs(10, false, false)

            ]);
        }
    }
}
