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
                'trun' => 1
            ],
            [
                'name' => 'Chocorate cake',
                'trun' => 2
            ],
            [
                'name' => 'Short cake',
                'trun' => 3
            ],
            [
                'name' => 'Season cake',
                'trun' => 4
            ],
        ]);
    }
}
