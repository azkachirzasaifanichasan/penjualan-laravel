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
                'name'     => 'Super Admin',
                'password' => 'rahasia123',
                'role'     => 'superadmin',
            ],
        );

        User::updateOrCreate(
            ['email' => 'karyawan@toko.test'],
            [
                'name'     => 'Karyawan Toko',
                'password' => 'rahasia123',
                'role'     => 'karyawan',
            ],
        );
    }
}
