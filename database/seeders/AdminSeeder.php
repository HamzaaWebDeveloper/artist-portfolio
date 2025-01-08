<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        admin::create([
            "name" => "Techsynced",
            "email" => "guyonpc99@gmail.com",
            "password" => Hash::make("123456789")
        ]);
    }
}
