<?php

namespace Modules\Product\database\seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories=['Antivirus','Mainboard','CPU','RAM','SSD','HDD'];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name'=>$category,
                'slug'=>Str::slug($category),
                'parent_id'=>0,
                'created_id'=>0,
                'created_at'=>Date('Y-m-d H:i:s'),
                'updated_at'=>Date('Y-m-d H:i:s'),
            ]);
        }
    }
}
