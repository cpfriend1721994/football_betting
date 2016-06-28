<?php

use Illuminate\Database\Seeder;

class MatchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('matches')->insert([
            'home_team' => str_random(7),
            'guest_team' => str_random(7),
            
        ]);
    }
}
