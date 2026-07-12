<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@rinjanitrail.id'],
            [
                'name' => 'Administrator RinjaniTrail',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );
    }
}
