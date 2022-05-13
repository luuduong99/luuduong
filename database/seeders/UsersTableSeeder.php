<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Users;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $limit = 100;
        for ($i = 0; $i < $limit; $i++) {
            Users::create([
                'id' => $faker->unique()->ean8,
                'name' => $faker->name,
                'password' => md5(12345678),
                'mail_address' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber(),
                'address' => $faker->address,
                'created_at' => $faker->dateTime()
            ]);
        }
    }
}
