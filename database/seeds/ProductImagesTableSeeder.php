<?php

use Illuminate\Database\Seeder;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\ProductImage::create(
            [
                'product_id' => 1,
                'image' => 'https://i1.rozetka.ua/goods/4381047/adidas_4059323881564_images_4381047304.jpg'
            ]);

        \App\ProductImage::create(
            [
                'product_id' => 4,
                'image' => 'https://i1.rozetka.ua/goods/2286747/adidas_aq1625_4.5_images_2286747890.jpg'
            ]);
    }
}
