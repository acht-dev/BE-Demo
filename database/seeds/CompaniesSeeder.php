<?php

use App\Entities\Companies;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('Companies')->truncate();
        factory(Companies::class, 20)->create();
    }
}
