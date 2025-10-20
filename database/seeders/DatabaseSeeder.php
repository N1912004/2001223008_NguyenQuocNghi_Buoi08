<?php

namespace Database\Seeders;
use App\Models\Profile; 
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Category::factory()
            ->count(5)
            ->hasProducts(10)
            ->create();

       $faker = Faker::create();

        User::factory(5)->create()->each(function ($user) use ($faker) 
        {
            Profile::create([
                'user_id' => $user->id,
                'address' => $faker->address(),
                'phone' => $faker->phoneNumber(),
            ]);
        });

        $this->call(StudentCourseSeeder::class);
        $this->call(ProfileSeeder::class);

    }
}
