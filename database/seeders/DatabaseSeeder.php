<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionTableSeeder::class,
        ]);
        $role = Role::create([
            'name' => config('permission.super_role_admin'),
            'guard_name' => 'admin'
        ]);
        $role->syncPermissions(Permission::get());

        $superAdmin = Admin::create([
            'name' => 'Super Admin',
            'email' => 'super_admin@admin.com',
            'password'=> Hash::make('123123123'),
        ]);
        $superAdmin->assignRole($role);
    }
}
