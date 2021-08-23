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
       $admin =  \App\User::create([
            'name'      =>  'Admin',
            'email'     =>  'admin@admin.com',
            'mobile'     =>  '01740929512',
            'user_type'     =>  'admin',
            'password'  =>  bcrypt('admin'),
        ]);
       \App\Donor::create(
           [
               'user_id' => $admin->id,
               'union_id' => 1,
               'blood_group_id' => 1,
               'gender_id' => 1,
               'religion_id' => 1,
               'weight' => 60,
               'dob' => '1997-10-02',

           ]
       );

       $user = \App\User::create([
            'name'      =>  'User',
            'email'     =>  'user@admin.com',
            'mobile'     =>  '01571753214',
            'user_type'     =>  'user',
            'password'  =>  bcrypt('user'),
        ]);

        \App\Donor::create(
            [
                'user_id' => $user->id,
                'union_id' => 1,
                'blood_group_id' => 1,
                'gender_id' => 1,
                'religion_id' => 1,
                'weight' => 60,
                'dob' => '1997-10-02',

            ]
        );
    }
}
