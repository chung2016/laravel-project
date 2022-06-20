<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);
        $user = \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
        ]);

        \App\Models\User::factory(10)->create();
        $admin->syncRoles(['admin']);
        $user->syncRoles(['user']);
    }
}
