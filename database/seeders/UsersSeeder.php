<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'superadmin@toko.test'],
            [
                'name'     => 'superadmin',
                'password' => 'superadmin123',
                'role'     => 'superadmin',
            ],
        );

        User::updateOrCreate(
            ['email' => 'admin@toko.test'],
            [
                'name'     => 'admin',
                'password' => 'admin123',
                'role'     => 'karyawan',
            ],
        );
    }
}
