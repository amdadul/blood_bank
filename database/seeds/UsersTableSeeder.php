<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'      =>  'Admin',
            'email'     =>  'admin@admin.com',
            'mobile'     =>  '01740929512',
            'user_type'     =>  'admin',
            'password'  =>  bcrypt('admin'),
        ]);

        \App\User::create([
            'name'      =>  'User',
            'email'     =>  'user@admin.com',
            'mobile'     =>  '01571753214',
            'user_type'     =>  'user',
            'password'  =>  bcrypt('user'),
        ]);
    }
}
