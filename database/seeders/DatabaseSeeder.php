<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(20)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test',
            'lastName' => 'User Test',
            'endereco' => 'lorem ipsun dor mente',
            'telefone' => '(12) 345678901',
            'level' => 'user',
            'email' => 'test@example.com',
        ]);
    }
}
