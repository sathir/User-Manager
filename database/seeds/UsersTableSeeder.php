<?php

use Illuminate\Database\Seeder;
use app\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert ([

            'name'=> "Sathir",
            'email'=> "Sathir@live.com",
            'password'=>Hash::make('Admin1234'),

        ]);
        DB::table('users')->insert ([

            'name'=> Str::random(10),
            'email'=>"Manager@gmail.com",
            'password'=>Hash::make('Admin1234'),

        ]);
        DB::table('users')->insert ([

            'name'=> Str::random(10),
            'email'=>"Instructor@gmail.com",
            'password'=>Hash::make('Admin1234'),

        ]);
        DB::table('users')->insert ([

            'name'=> Str::random(10),
            'email'=>"Student@gmail.com",
            'password'=>Hash::make('Admin1234'),

        ]);
    }
}
