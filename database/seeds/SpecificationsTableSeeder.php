<?php

use Illuminate\Database\Seeder;

class SpecificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Specification::create(
            [
                'variation_id' => 1,
                'attribute' => 'size',
                'value' => 'small'
            ]);

        \App\Specification::create(
            [
                'variation_id' => 1,
                'attribute' => 'size',
                'value' => 'medium'
            ]);

        \App\Specification::create(
            [
                'variation_id' => 1,
                'attribute' => 'size',
                'value' => 'large'
            ]);

        \App\Specification::create(
            [
                'variation_id' => 1,
                'attribute' => 'color',
                'value' => 'blue'
            ]);

        \App\Specification::create(
            [
                'variation_id' => 1,
                'attribute' => 'color',
                'value' => 'red'
            ]);

        \App\Specification::create(
            [
                'variation_id' => 1,
                'attribute' => 'color',
                'value' => 'green'
            ]);

        \App\Specification::create(
            [
                'variation_id' => 2,
                'attribute' => 'size',
                'value' => 'small'
            ]);

        \App\Specification::create(
            [
                'variation_id' => 2,
                'attribute' => 'size',
                'value' => 'medium'
            ]);

        \App\Specification::create(
            [
                'variation_id' => 2,
                'attribute' => 'color',
                'value' => 'red'
            ]);

        \App\Specification::create(
            [
                'variation_id' => 2,
                'attribute' => 'color',
                'value' => 'blue'
            ]);

        \App\Specification::create(
            [
                'variation_id' => 3,
                'attribute' => 'size',
                'value' => 'large'
            ]);

        \App\Specification::create(
            [
                'variation_id' => 3,
                'attribute' => 'color',
                'value' => 'blue'
            ]);
        \App\Specification::create(
            [
                'variation_id' => 4,
                'attribute' => 'size',
                'value' => 'medium'
            ]);

        \App\Specification::create(
            [
                'variation_id' => 4,
                'attribute' => 'size',
                'value' => 'large'
            ]);

        \App\Specification::create(
            [
                'variation_id' => 4,
                'attribute' => 'color',
                'value' => 'red'
            ]);
    }
}
