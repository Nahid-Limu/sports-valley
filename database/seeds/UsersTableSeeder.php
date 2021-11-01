<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [   'id'           => 1,
                'name'         => 'super admin',
                'email'        => 'superadmin@email.com',
                'password'     => bcrypt('admin'),
            ],
            [  'id'           => 2,
                'name'         => 'sportsvalley',
                'email'        => 'sportsvalley@email.com',
                'password'     => bcrypt('admin'),
            ],
           
        ]);
    }
}
