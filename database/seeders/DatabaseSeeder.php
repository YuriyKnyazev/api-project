<?php

namespace Database\Seeders;

use App\Enums\User\UserRoleEnum;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->create([
            "name" => "Yuriy",
            "email" => "admin@admin.com",
            "password" => "12345678",
            "role" => UserRoleEnum::ADMIN->value
        ]);
    }
}
