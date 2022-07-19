<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisions = array(
            array('id' => '1','name' => 'Chattagram'),
            array('id' => '2','name' => 'Rajshahi'),
            array('id' => '3','name' => 'Khulna'),
            array('id' => '4','name' => 'Barisal'),
            array('id' => '5','name' => 'Sylhet'),
            array('id' => '6','name' => 'Dhaka'),
            array('id' => '7','name' => 'Rangpur'),
            array('id' => '8','name' => 'Mymensingh')
        );

        DB::table('divisions')->insert($divisions);
    }
}
