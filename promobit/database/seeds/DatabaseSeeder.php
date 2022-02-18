<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        DB::table('users')->insert([
            'name' => 'promobit',
            'email' => 'promobit@promobit.com',
            'password' => Hash::make('promobit'),
            
        ]);
        DB::table('tags')->insert([
            ['name' => 'Gold',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ',
            'image' => 'tags/gold.png'],
            ['name' => 'Silver',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ',
            'image' => 'tags/silver.png'],
            ['name' => 'Bronze',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ',
            'image' => 'tags/bronze.png'],
            ['name' => 'Iron',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ',
            'image' => 'tags/iron.png'],
            ['name' => 'Water',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ',
            'image' => 'tags/water.png'],
        ]);
        DB::table('products')->insert([
            ['name' => 'Audi',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ',
            'image' => 'products/audi.jpeg'],
            ['name' => 'BMW',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ',
            'image' => 'products/bmw.jpg'],
            ['name' => 'Ferrari',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ',
            'image' => 'products/index.jpeg'],
            ['name' => 'Lamborguini',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ',
            'image' => 'products/lamborghini.jpeg'],
            ['name' => 'Porche',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ',
            'image' => 'products/porche.jpeg'],
            ['name' => 'Uno',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ',
            'image' => 'products/uno.jpeg'],
            ['name' => 'Yugo',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ',
            'image' => 'products/yugo.jpeg'],
        ]);

    }
}
