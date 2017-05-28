<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class roleUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* seed the roles */
        $roles = ['ROLE_SUPER_ADMIN', 'ROLE_ADMIN', 'ROLE_SUNSCRIBER'];
        foreach ($roles as $role){
            DB::table('roles')->insert([
                'name' => $role,
                'description' => 'this is a discription of '.$role,
                'created_at' => Carbon::now()
            ]);
        }

        /* seed the pivot table [role_user] */

        for($i = 1; $i< 20; $i++){
            DB::table('role_user')->insert([
                'user_id' => rand(1, 50),
                'role_id' => rand(1,3),
                'created_at' => Carbon::now()
            ]);
        }
    }
}
