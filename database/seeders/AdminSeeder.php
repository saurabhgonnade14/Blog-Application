<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            'name'=>"Admin",
            'email'=>"admin@admin.com",
            'username'=>"admin",
            'phone_no'=>"123456789",
            'password'=>Hash::make('1234567890')


        ]);

    }
}
