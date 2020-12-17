<?php

use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
            [
                'name' => 'Cheese cake',
                'turn' => 1
            ],
            [
                'name' => 'Chocorate cake',
                'turn' => 2
            ],
            [
                'name' => 'Short cake',
                'turn' => 3
            ],
            [
                'name' => 'Season cake',
                'turn' => 4
            ],
        ]);
    }
}
