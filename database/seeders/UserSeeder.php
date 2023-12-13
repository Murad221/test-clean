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
    public function run()
    {
        $user = User::create([
            'name' => 'Darlington Okorie',
            'email' => 'darlingtonokoriec@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user->role()->attach([1,3]);

        $user2 = User::create([
            'name' => 'Aziz',
            'email' => 'aziz@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $user2->role()->attach([2]);
    }
}
