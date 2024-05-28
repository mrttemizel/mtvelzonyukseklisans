<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'role' => User::ROLE_ADMIN,
                'name' => 'Murat TEMİZEL',
                'email' => 'murat.temizel@antalya.edu.tr',
                'password' => '$2y$10$AOClkj6hL0p..zy/KdWe9eN71KWdQqZuoVXkuwt4Y2hS4dQ9t9bWK',
                'status' => 2,
            ],
            [
                'role' => User::ROLE_ADMIN,
                'name' => 'Oguz Topcu',
                'email' => 'oguz.topcu@antalya.edu.tr',
                'password' => bcrypt('admin*!!'),
                'status' => 2,
            ]
        ];

        foreach ($admins as $admin) {
            if (User::query()->where('email', $admin['email'])->exists()) {
                continue;
            }

            User::query()->create($admin);
        }
    }
}
