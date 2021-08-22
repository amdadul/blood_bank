<?php

use Illuminate\Database\Seeder;

class DistrictTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $district = \App\District::create(
            [
                'name'=>'Sirajganj',
                'status'=>1,
            ]
        );

       $police_station = \App\PoliceStation::create(
           [
               'district_id' => $district->id,
               'name'=>'Sirajganj Sadar',
               'status'=>1,
           ]
       );

       $post_office = \App\PostOffice::create(
           [
               'police_station_id' => $police_station->id,
               'name'=>'Sirajganj',
               'post_code' => '6700',
               'status'=>1,
           ]
       );

       $union = \App\Union::create(
       [
           'post_office_id' => $post_office->id,
           'name'=>'Bohuli',
           'status'=>1,
       ]
       );
    }
}
