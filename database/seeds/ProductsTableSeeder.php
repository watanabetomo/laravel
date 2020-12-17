<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'チョコレートケーキ',
                'product_category_id' => 2,
            ],
            [
                'name' => 'チーズケーキ',
                'product_category_id' => 1,
            ],
        ]);
    }
}
