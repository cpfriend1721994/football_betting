<?php

use Illuminate\Database\Seeder;
use App\User2;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          /*User2::create(
          	array(
          		'name' => str_random(7),
	            'email' => str_random(7).'@gmail.com',
	            'password' => bcrypt('123456'),
	            'money' => '5000'
          		)
        );*/
        
        $faker=Faker::create();
        for($i=26;$i<30;$i++){
          User2::create([
              'name' => $faker->name,
              'email' => $faker->unique()->email,
              'password' => bcrypt('123456'),
            ]);
        }
    }
}
