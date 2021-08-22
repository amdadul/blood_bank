<?php

use Illuminate\Database\Seeder;

class LookupsTableSeeder extends Seeder
{


    protected $lookups = [
        [
            'name' => 'Male',
            'type' => 'gender',
            'code' => '1'
        ],
        [
            'name' => 'Female',
            'type' => 'gender',
            'code' => '2'
        ],
        [
            'name' => 'Others',
            'type' => 'gender',
            'code' => '3'
        ],
        [
            'name' => 'Islam',
            'type' => 'religion',
            'code' => '1'
        ],
        [
            'name' => 'Hinduism',
            'type' => 'religion',
            'code' => '2'
        ],
        [
            'name' => 'Cristian',
            'type' => 'religion',
            'code' => '3'
        ],
        [
            'name' => 'Register',
            'type' => 'history',
            'code' => '1'
        ],
        [
            'name' => 'Login',
            'type' => 'history',
            'code' => '2'
        ],
        [
            'name' => 'Request',
            'type' => 'history',
            'code' => '3'
        ],
        [
            'name' => 'Donate',
            'type' => 'history',
            'code' => '4'
        ],
        [
            'name' => 'Logout',
            'type' => 'history',
            'code' => '5'
        ],
        [
            'name' => 'Accept',
            'type' => 'history',
            'code' => '6'
        ],
        [
            'name' => 'A (+ve)',
            'type' => 'blood_group',
            'code' => '1'
        ],
        [
            'name' => 'A (-ve)',
            'type' => 'blood_group',
            'code' => '2'
        ],
        [
            'name' => 'B (+ve)',
            'type' => 'blood_group',
            'code' => '3'
        ],
        [
            'name' => 'B (-ve)',
            'type' => 'blood_group',
            'code' => '4'
        ],
        [
            'name' => 'AB (+ve)',
            'type' => 'blood_group',
            'code' => '5'
        ],
        [
            'name' => 'AB (-ve)',
            'type' => 'blood_group',
            'code' => '6'
        ],
        [
            'name' => 'O (+ve)',
            'type' => 'blood_group',
            'code' => '7'
        ],
        [
            'name' => 'O (-ve)',
            'type' => 'blood_group',
            'code' => '8'
        ],
        [
            'name' => 'Father',
            'type' => 'relation',
            'code' => '1'
        ],
        [
            'name' => 'Mother',
            'type' => 'relation',
            'code' => '2'
        ],
        [
            'name' => 'Son',
            'type' => 'relation',
            'code' => '3'
        ],
        [
            'name' => 'Daughter',
            'type' => 'relation',
            'code' => '4'
        ],
        [
            'name' => 'Husband',
            'type' => 'relation',
            'code' => '5'
        ],
        [
            'name' => 'Wife',
            'type' => 'relation',
            'code' => '6'
        ],
        [
            'name' => 'Brother',
            'type' => 'relation',
            'code' => '7'
        ],
        [
            'name' => 'Sister',
            'type' => 'relation',
            'code' => '8'
        ],

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->lookups as $index => $lookup) {
            $result = \App\Lookup::create($lookup);
            if (!$result) {
                $this->command->info("Inserted at record $index.");
                return;
            }
            $this->command->info('Inserted '.count($this->lookups) . ' records');
        }
    }
}
