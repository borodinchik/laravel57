<?php

use Illuminate\Database\Seeder;

class VariationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Variation::create([
            "sku" => "#" . rand(1, 100000000),
//            "image" => "https://i1.rozetka.ua/goods/4381047/adidas_4059323881564_images_4381047304.jpg",
            "product_id" => 1,
            "price" => 2500,
            "in_stock" => 15
        ]);

//        \App\Variation::create([
//            "sku" => "#" . rand(1, 100000000),
//            "image" => "https://i2.rozetka.ua/goods/1528038/nike_812654_001_11_5_images_1528038611.jpg",
//            "product_id" => 1,
//            "price" => 2000,
//            "in_stock" => 8
//        ]);
//
//        \App\Variation::create([
//            "sku" => "#" . rand(1, 100000000),
//            "image" => "https://i2.rozetka.ua/goods/5032905/nike_886737447079_images_5032905456.jpg",
//            "product_id" => 1,
//            "price" => 1300,
//            "in_stock" => 5
//        ]);

        \App\Variation::create([
            "sku" => "#" . rand(1, 100000000),
//            "image" => "https://i1.rozetka.ua/goods/2286747/adidas_aq1625_4.5_images_2286747890.jpg",
            "product_id" => 1,
            "price" => 1300,
            "in_stock" => 5
        ]);
    }
}
