<?php

use Illuminate\Database\Seeder;
use App\Bet;

class BetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Bet::create(
            array(
                'match_id' =>rand(2,4),
                'user_id' => rand(1,25),
                'money' => 10,
                'choose' => 'tie'
                )
        );
    }
}