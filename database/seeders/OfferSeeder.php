<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("offers")->insert([
            "name" => "Travelling Essentials for you",
            "reg_price" => 0,
            "offer" => 0,
            "offer_description" => "“Travel is  fatal to prejudice, bigotry, and narrow mindedness, and many of our people need it sorely on these accounts.”<br>~ Mark Twain",
            "file" => "travel.webp",
        ]);
    }
}
