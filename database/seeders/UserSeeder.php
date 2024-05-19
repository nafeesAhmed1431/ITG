<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
            'role' => User::ROLE_SUPER_ADMIN,
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => User::ROLE_ADMIN,
        ]);

        User::create([
            'name' => 'Customer',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'role' => User::ROLE_CUSTOMER,
        ]);

        User::create([
            'name' => 'Customer 1',
            'email' => 'customer1@example.com',
            'password' => Hash::make('password'),
            'role' => User::ROLE_CUSTOMER,
        ]);

        User::create([
            'name' => 'Customer 2',
            'email' => 'customer2@example.com',
            'password' => Hash::make('password'),
            'role' => User::ROLE_CUSTOMER,
        ]);

        User::create([
            'name' => 'Customer 3',
            'email' => 'customer3@example.com',
            'password' => Hash::make('password'),
            'role' => User::ROLE_CUSTOMER,
        ]);

        User::create([
            'name' => 'Cashier',
            'email' => 'cashier@example.com',
            'password' => Hash::make('password'),
            'role' => User::ROLE_CASHIER,
        ]);

        User::create([
            'name' => 'Purchaser',
            'email' => 'purchaser@example.com',
            'password' => Hash::make('password'),
            'role' => User::ROLE_PURCHASER,
        ]);
    }
}
