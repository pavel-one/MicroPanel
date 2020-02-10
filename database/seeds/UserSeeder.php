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
                'name' => 'Главный',
                'middle_name' => 'Администратор',
                'email' => 'pavel@orendat.ru',
                'password' => bcrypt('admin'),
                'sudo' => true,
                'active' => true
            ]);
            //Профили к ним
            DB::table('user_profiles')->insert([
                'user_id' => 1,
                'address' => 'ул. Пушкина, д.25',
                'city' => 'Москва',
                'country' => 'Россия',
                'dob' => '1996.11.19',
            ]);
        }


        //TODO: Сделать фабрику
        for ($i = 2; $i <= 10; $i++) {
            $faker = Factory::create('ru_RU');
            DB::table('users')->insert([
                'username' => $faker->userName,
                'name' => $faker->firstName,
                'email' => $faker->email,
                'middle_name' => $faker->lastName,
                'password' => bcrypt($faker->password),
                'sudo' => false,
                'active' => true
            ]);
            DB::table('user_profiles')->insert([
                'user_id' => $i,
                'address' => $faker->address,
                'city' => $faker->city,
                'country' => $faker->country,
                'dob' => $faker->dateTimeBetween('1990-01-01', '2012-12-31'),
            ]);
        }

    }
}
