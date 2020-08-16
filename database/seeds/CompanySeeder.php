<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            "id" => 1,
            'name' => "Hilbert IS",
            'email' => "contact@hilbert-is.com",
            'address' => "2 Rue Turgot, 75009 Paris",
            'phone' => "0177623811",
            'website' => "https://hilbert-is.com",
        ]);
    }
}
