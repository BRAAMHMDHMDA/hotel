<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::updateOrCreate([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123123123'),
        ]);
    }
}
