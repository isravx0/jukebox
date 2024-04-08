<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Lukas',
            'email' => 'Lukas.v.Hulst@gmail.com',
            'password' => '12345'
        ]);

        User::factory()->count(50)->create();
    }
}
