<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'moderator',
            'email' => 'moderator@moderator.moderator',
            'password' => Hash::make('123456'),
            'role'=>'moderator'
        ]);
    }
}
