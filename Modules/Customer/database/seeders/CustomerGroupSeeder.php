<?php

namespace Modules\Customer\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customer_groups')->insert([

            'name' => 'Công ty',
            'created_id' => 0,
        ]);
        DB::table('customer_groups')->insert([

            'name' => 'Khách lẻ',
            'created_id' => 0,
        ]);
    }
}
