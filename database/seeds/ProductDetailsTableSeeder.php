<?php

use Illuminate\Database\Seeder;

class ProductDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_details')->insert([
            [
                'product_id' => 1,
                'size' => 10,
                'price' => 200,
                'turn' => 1
            ],
            [
                'product_id' => 1,
                'size' => 20,
                'price' => 300,
                'turn' => 2
            ],
            [
                'product_id' => 1,
                'size' => 30,
                'price' => 400,
                'turn' => 3
            ],
            [
                'product_id' => 1,
                'size' => 50,
                'price' => 600,
                'turn' => 4
            ],
            [
                'product_id' => 1,
                'size' => 60,
                'price' => 700,
                'turn' => 5
            ],
            [
                'product_id' => 2,
                'size' => 10,
                'price' => 200,
                'turn' => 1
            ],
            [
                'product_id' => 2,
                'size' => 20,
                'price' => 300,
                'turn' => 2
            ],
            [
                'product_id' => 2,
                'size' => 30,
                'price' => 400,
                'turn' => 3
            ],
            [
                'product_id' => 2,
                'size' => 50,
                'price' => 600,
                'turn' => 4
            ],
            [
                'product_id' => 2,
                'size' => 60,
                'price' => 700,
                'turn' => 5
            ],
        ]);
    }
}
