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
        // $this->call(UsersTableSeeder::class);
         $this->call(ProductsTableSeeder::class);
         $this->call(VariationsTableSeeder::class);
         $this->call(SpecificationsTableSeeder::class);
         $this->call(ProductImagesTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
    }
}
