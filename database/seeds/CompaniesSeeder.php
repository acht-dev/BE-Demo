<?php

use App\Entities\Companies;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(Companies::class, 20)->create();
    }
}
