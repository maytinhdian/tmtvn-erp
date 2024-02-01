<?php

namespace Modules\Customer\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([

            'name' => 'Yang Cheng',
            'group_id' => 1,
            'email'=>'yangcheng@maytinhdian.com',
            'created_id'=>0,
            'cellphone'=>'0399222222',
            'address'=>"KCN Đồng An , Thuận An , Bình Dương"
        ]);

        DB::table('customers')->insert([

            'name' => 'Minh Triet',
            'group_id' => 2,
            'email'=>'tnhalk@maytinhdian.com',
            'created_id'=>0,
            'cellphone'=>'0399222299',
            'address'=>"133/9 duong Do Tan Phong"
        ]);
    }
}
