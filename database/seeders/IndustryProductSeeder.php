<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustryProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('industries')->insert([
            ['name' => 'Architecture, Engineering, Construction'],
            ['name' => 'Product Design & Manufacturing'],
            ['name' => 'Media & Entertainment'],
            ['name' => 'Others'],
        ]);

        DB::table('products')->insert([
            ['name' => 'AutoCAD IST'],
            ['name' => 'AutoCAD LT'],
            ['name' => 'Revit LT Suite'],
            ['name' => '3ds MAX'],
        ]);

        DB::table('asset_types')->insert([
            ['name' => 'Video','type'   =>  ".mov,.mp4"],
            ['name' => 'Audio','type'   => ".mp3,.mp4,.mpeg" ],
            ['name' => 'PPT','type'     => "" ],
            ['name' => 'Docs/PDF','type'=> "Brochure, Battelcard, sales Play" ],
            ['name' => 'Images','type'  =>  ".png, .jpg, .jpeg, .tif, .gif, .html"],
        ]);

        DB::table('asset_utilizations')->insert([
            ['name' => 'Partner Centric'],
            ['name' => 'Customer Centric'],
        ]);

        DB::table('languages')->insert([
            ['name' => 'English'],
            ['name' => 'Vietnam'],
            ['name' => 'Cantonese'],
            ['name' => 'Bahasa'],
        ]);

        DB::table('countries')->insert([
            ['name' => 'India'],
            ['name' => 'HongKong'],
            ['name' => 'Singapore'],
            ['name' => 'Malaysia'],
            ['name' => 'Vietnam'],
        ]);
    }
}

