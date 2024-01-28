<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_list = Permission::create(['name' => 'users.list']);
        $user_view = Permission::create(['name' => 'users.view']);
        $user_create = Permission::create(['name' => 'users.create']);
        $user_update = Permission::create(['name' => 'users.update']);
        $user_delete = Permission::create(['name' => 'users.delete']);

        $admin_role = Role::create(['name' => 'admin']);
        $admin_role->givePermissionTo([
            $user_create,
            $user_list,
            $user_update,
            $user_view,
            $user_delete,
        ]);
        DB::statement('SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";');
        $admin = User::create([
            'name' => 'Le Thanh Nha',
            'email' => 'tnhalk@maytinhdian.com',
            'password' => Hash::make('123456'),
            'id' => 0,
            'created_at' => Date('Y-m-d H:i:s'),
            'updated_at' => Date('Y-m-d H:i:s'),
        ]);

        // DB::statement('SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";');
        // $admin = DB::table('users')->insert([
        //     'name' => 'Le Thanh Nha',
        //     'email' => 'tnhalk@maytinhdian.com',
        //     'password' => Hash::make('123456'),
        //     'id' => 0,
        //     'created_at' => Date('Y-m-d H:i:s'),
        //     'updated_at' => Date('Y-m-d H:i:s'),
        // ]);

        $admin->assignRole($admin_role);
        $admin->givePermissionTo([
            $user_create,
            $user_list,
            $user_update,
            $user_view,
            $user_delete,
        ]);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
        ]);

        $user_role = Role::create(['name' => 'user']);

        $user->assignRole($user_role);
        $user->givePermissionTo([
            $user_list,
        ]);

        $user_role->givePermissionTo([
            $user_list,
        ]);
    }
}
