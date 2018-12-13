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
        \App\Product::create(
            [
                "name" => "Кроссовки Adidas Terrex Cc Voyager",
                "slug" => "krossovki_adidas_terrex_cc_voyager",
                "description" => "Кроссовки Adidas Terrex Cc Voyager CM7535 46.5 (12.5) 29.7 см Черные",
                "type" => true //1 это простой 2 сложный
            ]);

        \App\Product::create(
            [
                "name" => "Кроссовки Nike Tanjun",
                "slug" => "krossovki_nike_tanjun",
                "description" => "Кроссовки Nike Tanjun 812654-001 44 (11.5) 29,5 см",
                "type" => true //1 это простой 2 сложный
            ]);

        \App\Product::create(
            [
                "name" => "Кроссовки Nike Wmns Air Max",
                "slug" => "krossovki_nike_wmns_air_max",
                "description" => "Кроссовки Nike Wmns Air Max Invigor Se 882259-400 37 (7) 24 см",
                "type" => false //1 это простой 2 сложный
            ]);

        \App\Product::create(
            [
                "name" => "Кроссовки Adidas Cf Qt Racer Mid W",
                "slug" => "krossovki_adidas_gf_qt_racer_mid_w",
                "description" => "Кроссовки Adidas Cf Qt Racer Mid W AQ1625 37.5 (4.5) 22.9 см",
                "type" => false //1 это простой 2 сложный
            ]);
    }
}
