<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $permissions = [
//            'role-list', 'role-create', 'role-edit', 'role-delete',
//            'admin-list', 'admin-create', 'admin-edit', 'admin-delete',
//            'category-list', 'category-create', 'category-edit', 'category-delete',
//            'settings-list', 'settings-edit',
//            'profile-list', 'profile-settings', 'profile-edit-basicInfo', 'profile-edit-email','profile-edit-password',
//        ];
        $permissionsAdmin = config('permissionsList.admin');

        foreach ($permissionsAdmin as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'admin'
            ]);
        }
    }
}