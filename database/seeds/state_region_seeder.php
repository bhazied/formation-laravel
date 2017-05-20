<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class state_region_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            'sousse' => ['kalaa kebira','hammam sousse', 'sousse'],
            'tunis' => ['ariana','marssa', 'manzah'],
            'nabeul' => ['slimen','bni khallad', 'manzel tmim'],
            'mounatir' => ['jammel','manzel harb', 'sayada'],
        ];
        $i=4;
        foreach ($states as $state => $regions){
             DB::table('states')->insert([
                'name' => $state,
                'created_at' => Carbon::now()
            ]);
            foreach ($regions as $region){
                DB::table('regions')->insert([
                    'name' => $region,
                    'state_id' => $i,
                    'created_at' => Carbon::now()
                ]);
            }
            $i++;
        }

    }
}
