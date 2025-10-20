<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Faker\Factory as Faker;   // 👈 thêm dòng này

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();   // 👈 tạo đối tượng Faker

        User::factory(5)->create()->each(function ($user) use ($faker) {
            Profile::create([
                'user_id' => $user->id,
                'address' => $faker->address(),
                'phone'   => $faker->phoneNumber(),
            ]);
        });
    }
}
