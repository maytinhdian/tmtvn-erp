<?php

namespace Modules\Customer\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Customer\app\Models\CustomerGroup;

class CustomerDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            CustomerGroupSeeder::class,
            CustomerSeeder::class,
        ]);
    }
}
