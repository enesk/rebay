<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class UserTableSeeder
 */
class UserTableSeeder extends Seeder
{
    public function run()
    {
        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        if (env('DB_CONNECTION') == 'mysql') {
            DB::table(config('access.users_table'))->truncate();
        } elseif (env('DB_CONNECTION') == 'sqlite') {
            DB::statement('DELETE FROM ' . config('access.users_table'));
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE ' . config('access.users_table') . ' CASCADE');
        }

        //Add the master administrator, user id of 1
        $users = [
            [
                'name'              => 'Enes Kul',
                'email'             => 'kul@widimedia.com',
                'password'          => bcrypt('q1e3w2.'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'name'              => 'Murat Günes',
                'email'             => 'info@gunes24.de',
                'password'          => bcrypt('gunes24'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ];

        DB::table(config('access.users_table'))->insert($users);

        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}