<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Auth;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
        DB::table('apartments')->insert([
            'user_id' => 91,
            'vrlink' => "https://eyes360.cloud/lacville/twinhousedecor/",
            'location' => "Egypt" ,
            'status' => 'available',
            'dimensions' => 400,
            'descrption' => "lblblblblblblblbbl",
            'features' => "DJHAHFJKD",
        ]);
    }
    }
}
