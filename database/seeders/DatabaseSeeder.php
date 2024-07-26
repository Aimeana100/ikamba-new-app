<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'role' => 'primary_admin',
            'status' => 'active',
            'email' => 'admin@example.com',
        ]);
        Role::create(['name' => 'journalist']);
        Role::create(['name' => 'chief_editor']);
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'primary_admin']);
    }
}
