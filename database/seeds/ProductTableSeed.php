<?php

use Illuminate\Database\Seeder;

class ProductTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([ 
        	'imgpath' => 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1554006152l/6.jpg',
        	'title' => 'Harry Potter',
        	'description' => 'Super cool - atleast as a child.',
        	'price' => 10

        ]);
        $product->save();
        $product = new \App\Product([ 
        	'imgpath' => 'https://upload.wikimedia.org/wikipedia/en/thumb/d/dc/A_Song_of_Ice_and_Fire_book_collection_box_set_cover.jpg/220px-A_Song_of_Ice_and_Fire_book_collection_box_set_cover.jpg',
        	'title' => 'A Song of Ice and Fire',
        	'description' => 'No one is going to survive.',
        	'price' => 20

        ]);
        $product->save();
        $product = new \App\Product([ 
        	'imgpath' => 'https://www.bookcorner.com.pk/uploads/original/5c72aadbecf131551018715.jpg',
        	'title' => 'Lord of the Rings',
        	'description' => 'The Ring has awoken, it’s heard its masters call.',
        	'price' => 10

        ]);
        $product->save();
        $product = new \App\Product([ 
        	'imgpath' => 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1385248487l/18916590.jpg',
        	'title' => 'Sherlock Holmes',
        	'description' => 'The Journey Begins',
        	'price' => 40

        ]);
        $product->save();
        $product = new \App\Product([ 
        	'imgpath' => 'https://cssbooks.net/wp-content/uploads/2018/11/Paulo-Coelho-The-Alchemist-By-Alan-R.-Clarke.jpg',
        	'title' => 'The Alchemist',
        	'description' => 'The Best Seller of all time.',
        	'price' => 10

        ]);
        $product->save();
    }
}
