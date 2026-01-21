<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat Akun Admin
        User::create([
            'username' => 'batman',
            'password' => Hash::make('Batman123!'), // Password sesuai ketentuan (8 char, caps, simbol)
            'level'    => 'admin',
        ]);
    }
}