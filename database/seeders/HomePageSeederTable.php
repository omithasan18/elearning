<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomePage;
use Carbon\Carbon;

class HomePageSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        HomePage::insert([ 
            'name'=> 'Name',
            'details'=> 'Details',
            'status' => '1',
            'created_at' => Carbon::now(),
        ]);
        
        HomePage::insert([ 
            'name'=> 'Name',
            'youtube_link'=> 'https://youtube.com',
            'status' => '1',
            'created_at' => Carbon::now(),
        ]);
    }
}
