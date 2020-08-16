<?php

use App\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            "company_id" => 1,
            'first_name' => "Iftekhar",
            'last_name' => "Sarder",
            "email" => "contact@hilbert-is.com",
            "designation" => "Lead dev",
            'address' => "Londres",
            'phone' => "0102030405",
            'website' => "https://hilbert-is.com/index.php/notre-equipe/",
        ]);
    }
}
