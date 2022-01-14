<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("products")->insert([
            "name" => "Pampers Diaper Pants Large",
            "category" => "baby",
            "price" => "1029",
            "description" => "Pampers Diaper Pants Large (9-14 KG) 48 Pieces in a Bag",
            "img" => "https://qf7s26sxazr7uwqlogrl311.blob.core.windows.net/sys-master-root/h6e/hd6/12659573653534/1260032_main.jpg_480Wx480H",
        ]);
        
         }
}
