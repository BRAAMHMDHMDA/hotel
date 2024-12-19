<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Admin::updateOrCreate([
//            'name' => 'Super Admin',
//            'email' => 'admin@admin.com',
//            'password' => bcrypt('123123123'),
//        ]);
        $superAdmin = Admin::create([
            'name' => 'Super Admin',
            'email' => 'super_admin@admin.com',
            'password'=> Hash::make('123123123'),
        ]);
        $superAdmin->assignRole($role1);

    }
}
