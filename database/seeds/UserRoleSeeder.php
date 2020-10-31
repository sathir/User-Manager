<?php

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert ([

            'id'=> 1,
            'email' =>"Sathir@live.com",
            'type' => "Admin",

        ]);
        DB::table('roles')->insert ([

            'id'=> 2,
            'email' =>"Manager@gmail.com",
            'type' => "Manager",

        ]);
        DB::table('roles')->insert ([

            'id'=> 3,
            'email' =>"Instructor@gmail.com",
            'type' => "Instructor",

        ]);
        DB::table('roles')->insert ([

            'id'=> 4,
            'email' =>"Student@gmail.com",
            'type' => "Student",

        ]);
    }
}
