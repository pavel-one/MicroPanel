<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() === 'local') {
            //TODO: Сделать через команду artisan

            DB::table('users')->insert([
                'username' => 'admin',
                'name' => 'Administrator',
                'email' => 'pavel@orendat.ru',
                'password' => bcrypt('admin'),
            ]);
        }


        //TODO: Сделать фабрику
        for ($i = 0; $i < 10; $i++) {
            $faker = Factory::create();
            DB::table('users')->insert([
                'username' => $faker->userName,
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt($faker->password),
            ]);
        }

    }
}
