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
            ['name' => 'Informática',
            'detail' => 'Material para informática'],
            ['name' => 'HI-Tech',
            'detail' => 'Material de alta tecnologia'],
            ['name' => 'Mecânica',
            'detail' => 'Material mecânico'],
            ['name' => 'Cozinha',
            'detail' => 'Eletro para cozinha'],
            ['name' => 'Banheiro',
            'detail' => 'Mobiliário para banheiro'],
        ]);

    }
}
