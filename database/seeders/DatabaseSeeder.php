<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Dummy;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Dummy::factory(30)->create();

        $password = Hash::make('rahasia');
        User::create([
            'name' => 'Muhammad Iqbal',
            'email' => 'iqbal@mail.com',
            'email_verified_at' => now(),
            'password' => $password,
        ]);
    }
}

