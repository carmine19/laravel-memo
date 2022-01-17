<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run(Faker $faker)
    {
            $new_user = new User();
            $new_user->name = $faker->firstName(null);
            $new_user->password = Hash::make('testtest');
            $new_user->email = $faker->email();
            $checkEmail = User::where('email', $new_user->email)->first();
            while ($checkEmail) {
                $new_user->email = $faker->email();
                $checkEmail = User::where('email', $new_user->email)->first();
            }
            $new_user->save();

    }
}
