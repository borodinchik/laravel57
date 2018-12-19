<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.log.com',
                'email_verified_at' => now(),
                'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
                'remember_token' => str_random(10),
            ]);
    }
}
