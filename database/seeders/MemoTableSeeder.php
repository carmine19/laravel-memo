<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Memo;
use Faker\Generator as Faker;

class MemoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();

         foreach ($users as $user) {
             for ($i=0; $i < 1000; $i++) {
                 $new_job = new Memo();
                 $new_job->title = $faker->firstName();
                 $new_job->user_id = $user->id;
                 $new_job->description = $faker->text();
                 //$new_job->start_activity_date = $faker->dateTime();

                 $new_job->save();
             }

            };
    }
}
