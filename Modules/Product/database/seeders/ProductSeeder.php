<?php

namespace Modules\Product\database\seeders;

use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        $limit = 10;
        for ($limit = 0; $limit <= 10; $limit++) {
            $name = $faker->word() . $faker->randomDigit();
            DB::table('products')->insert([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $faker->text(),
                'categories_id' => $faker->numberBetween(1, 6),
                'price' => $faker->randomDigit(),
                'created_id' => 0,
                'created_at' => Date('Y-m-d H:i:s'),
                'updated_at' => Date('Y-m-d H:i:s'),
            ]);
        }
    }
}
