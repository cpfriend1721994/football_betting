<?php

use Illuminate\Database\Seeder;
use App\Match;

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
        Match::create(
            array(
                'home_team' => str_random(7),
                'guest_team' => str_random(7),
                'permision' => 'public',
                'home_score' => rand(1,9),
                'guest_score' => rand(1,9),
                'home_ratio' => rand(1,9),
                'guest_ratio' => rand(1,9),
                'tie_ratio' => rand(1,9)
                )
        );
    }
}
