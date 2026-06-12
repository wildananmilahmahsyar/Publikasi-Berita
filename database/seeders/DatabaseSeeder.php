<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@publikasi.test'],
            [
                'name' => 'Admin Web',
                'password' => Hash::make('admin12345'),
                'role' => 'admin_web',
                'is_active' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'sekretaris@publikasi.test'],
            [
                'name' => 'Sekretaris',
                'password' => Hash::make('sekretaris12345'),
                'role' => 'sekretaris',
                'is_active' => true,
            ]
        );
    }
}