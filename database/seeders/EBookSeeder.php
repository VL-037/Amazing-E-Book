<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ebook')->insert([
            ['title' => 'Going to the Ships', 'author' => 'Stephen King', 'description' => 'sheeeeeeeeeeeeeeeeeeeeeeeesh'],
            ['title' => 'Fish of Freedom', 'author' => 'Lewis Carroll', 'description' => 'sheeeeeeeeeeeeeeeeeeeeeeeesh'],
            ['title' => 'Element of the Sea', 'author' => 'J. K. Rowling', 'description' => 'sheeeeeeeeeeeeeeeeeeeeeeeesh'],
            ['title' => 'Kings and Rebels', 'author' => 'John Grisham', 'description' => 'sheeeeeeeeeeeeeeeeeeeeeeeesh'],
            ['title' => 'Blacksmiths and Women', 'author' => 'James Patterson', 'description' => 'sheeeeeeeeeeeeeeeeeeeeeeeesh'],
            ['title' => 'Means of the Ocean', 'author' => 'Stephen King', 'description' => 'sheeeeeeeeeeeeeeeeeeeeeeeesh'],
            ['title' => 'Vultures and Aliens', 'author' => 'Lewis Carroll', 'description' => 'sheeeeeeeeeeeeeeeeeeeeeeeesh'],
            ['title' => 'Spy of Sorrow', 'author' => 'Stephen King', 'description' => 'sheeeeeeeeeeeeeeeeeeeeeeeesh'],
            ['title' => 'Child of the River', 'author' => 'J. K. Rowling', 'description' => 'sheeeeeeeeeeeeeeeeeeeeeeeesh'],
            ['title' => 'Tree Without Courage', 'author' => 'Lewis Carroll', 'description' => 'sheeeeeeeeeeeeeeeeeeeeeeeesh'],
            ['title' => 'Enemies of Perfection', 'author' => 'James Patterson', 'description' => 'sheeeeeeeeeeeeeeeeeeeeeeeesh'],
            ['title' => 'Wives and Aliens', 'author' => 'J. K. Rowling', 'description' => 'sheeeeeeeeeeeeeeeeeeeeeeeesh'],
            ['title' => 'Certainty of Water', 'author' => 'Stephen King', 'description' => 'sheeeeeeeeeeeeeeeeeeeeeeeesh'],
            ['title' => 'Lion of Gold', 'author' => 'James Patterson', 'description' => 'sheeeeeeeeeeeeeeeeeeeeeeeesh'],
            ['title' => 'Blacksmiths of the Stockades', 'author' => 'James Patterson', 'description' => 'sheeeeeeeeeeeeeeeeeeeeeeeesh'],
            ['title' => 'Assassins of Dreams', 'author' => 'James Patterson', 'description' => 'sheeeeeeeeeeeeeeeeeeeeeeeesh'],
            ['title' => 'Hurting My Future', 'author' => 'Stephen King', 'description' => 'sheeeeeeeeeeeeeeeeeeeeeeeesh'],
            ['title' => 'Warriors Without Honor', 'author' => 'J. K. Rowling', 'description' => 'sheeeeeeeeeeeeeeeeeeeeeeeesh'],
            ['title' => 'Possessed by the Mist', 'author' => 'James Patterson', 'description' => 'sheeeeeeeeeeeeeeeeeeeeeeeesh'],
            ['title' => 'Vanishing Into My Dreams', 'author' => 'Stephen King', 'description' => 'sheeeeeeeeeeeeeeeeeeeeeeeesh'],
        ]);
    }
}
