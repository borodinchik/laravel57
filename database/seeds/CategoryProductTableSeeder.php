<?php

use Illuminate\Database\Seeder;

class CategoryProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('category_product')->insert(
            [
                'category_id' => 7,
                'product_id' => 1
            ]);

        \DB::table('category_product')->insert(
            [
                'category_id' => 7,
                'product_id' => 2
            ]);

        \DB::table('category_product')->insert(
            [
                'category_id' => 7,
                'product_id' => 3
            ]);

        \DB::table('category_product')->insert(
            [
                'category_id' => 7,
                'product_id' => 4
            ]);
    }
}
