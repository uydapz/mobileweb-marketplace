<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Dapzgank',
                'avatar' => "user/default.png", // bisa diganti URL avatar
                'email' => 'Dapz@gmail.com',  
                'position' => 'Ndexo Founder',  
                'email_verified_at' => now(),
                'password' => Hash::make('pwd'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Andy',
                'avatar' => "user/default.png",
                'email' => 'Andy@gmail.com',
                'position' => 'Ndexo Accounting',  
                'email_verified_at' => now(),
                'password' => Hash::make('pwd'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
