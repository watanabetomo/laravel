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
                'img' => '',
                'delivery_info' => '',
                'turn' => 1,
                'create_user' => 1,
                'update_user' => 1,
                'product_category_id' => 2,
            ],
            [
                'name' => 'チーズケーキ',
                'img' => '',
                'delivery_info' => '',
                'turn' => 2,
                'create_user' => 1,
                'update_user' => 1,
                'product_category_id' => 1,
            ],
        ]);
    }
}
