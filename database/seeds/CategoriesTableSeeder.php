<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create(
            [
                'title' => 'Одежда',
                'parent_id' => null
            ]);

        \App\Category::create(
            [
                'title' => 'Обувь',
                'parent_id' => null
            ]);





        //Одежды -> летняя зимняя
        \App\Category::create(
            [
                'title' => 'Летняя',
                'parent_id' => 1
            ]);

        \App\Category::create(
            [
                'title' => 'Зимняя',
                'parent_id' => 1
            ]);
        // обуви -> летняя,зимняя
        \App\Category::create(
            [
                'title' => 'Летняя',
                'parent_id' => 2
            ]);

        \App\Category::create(
            [
                'title' => 'Зимняя',
                'parent_id' => 2
            ]);
        //Одежды -> летняя зимняя -> Муржская, Женскася
        \App\Category::create([
                'title' => 'Муржская',
                'parent_id' => 3
            ]);

        \App\Category::create([
            'title' => 'Женская',
            'parent_id' => 3
        ]);
    // обувь -> летняя,зимняя , муржская Женская
        \App\Category::create([
            'title' => 'Муржская',
            'parent_id' => 4
        ]);

        \App\Category::create([
            'title' => 'Женская',
            'parent_id' => 4
        ]);

        \App\Category::create(
            [
                'title' => 'Муржская',
                'parent_id' => 5
            ]);

        \App\Category::create(
            [
                'title' => 'Женская',
                'parent_id' => 5
            ]);

        \App\Category::create(
            [
                'title' => 'Муржская',
                'parent_id' => 6
            ]);

        \App\Category::create(
            [
                'title' => 'Женская',
                'parent_id' => 6
            ]);
    }
}
