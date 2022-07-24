<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;
use Carbon\Carbon;

class SiteSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SiteSetting::insert([
            'name' => 'Demo Site Name',
            'address' => 'demo Address',
            'email' => 'demo@gmail.com',
            'phone'=> '01711111111',
            'created_at' => Carbon::now(),
        ]);
    }
}
