<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use App\Model\Author;
use App\Model\Publisher;
use App\Model\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        foreach (range(1,100) as $index) {
        	App\Model\Author::create([
        		'name' => $faker->name,
        	]);
        }

       	foreach (range(1,100) as $index) {
        	App\Model\Publisher::create([
        		'name' => $faker->company,
        	]);
        }

        $authors = Author::where('id', '>', 0)->pluck('id')->toArray();
        $publishers = Publisher::where('id', '>', 0)->pluck('id')->toArray();

        foreach (range(1,100) as $index) {
 			App\Model\Book::create([
        		'ISBN' => $faker->ean13,
        		'title' => $faker->name,
        		'date' => $faker->date,
        		'author_id' => $faker->randomElement($authors),
       			'publisher_id' => $faker->randomElement($publishers),    		
        	]);
        }
    }
}
