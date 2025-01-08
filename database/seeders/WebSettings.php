<?php

namespace Database\Seeders;

use App\Models\websetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebSettings extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        websetting::create([
            "company_name" => "techease",
            "address" => "Malir Cantt",
            "phone_number" => "+42 4324653231",
            "email" => "techease.bussiness@gmail.com",
            "instagram" => "https://www.instagram.com/",
            "linkedin" => "https://linkedin.com/",
            "facebook" => "https://www.facebook.com/",
        ]);
    }
}
