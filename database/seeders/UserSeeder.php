<?php

namespace Database\Seeders;

use App\Models\User;
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
        Collect([
            [
                'name' => 'rafi',
                'email' => 'rafi@example.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'kayron',
                'email' => 'kayron@example.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'abc',
                'email' => 'abc@example.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        ])->each(function ($user){
            \App\Models\User::create($user);
        });

        Collect(['admin', 'moderator'])->each(fn ($role) => \App\Models\Role::create(['name' => $role])); // php 7.4

        User::find(1)->roles()->attach([1]);

        User::find(2)->roles()->attach([2]);

    }
}
