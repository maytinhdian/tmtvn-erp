<?php

namespace Modules\Customer\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attributes')->insert([

            'attribute' => 'Mac Address',

            'created_id' => 0,

        ]);
        DB::table('attributes')->insert([

            'attribute' => 'Ip Address',

            'created_id' => 0,

        ]);
        DB::table('attributes')->insert([

            'attribute' => 'Cpu Mode',

            'created_id' => 0,

        ]);
    }
}
