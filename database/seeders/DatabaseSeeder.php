<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // DB::statement('SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";');
        // DB::table('users')->insert([
        //     'name'=>'Le Thanh Nha',
        //     'email'=>'tnhalk@maytinhdian.com',
        //     'password'=>Hash::make('123456'),
        //     'id'=>0,
        //     'created_at'=>Date('Y-m-d H:i:s'),
        //     'updated_at'=>Date('Y-m-d H:i:s'),
        // ]);
        $this->call(
            UserSeeder::class,
        );
    }
}
