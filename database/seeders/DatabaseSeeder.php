<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('election_candidates')->insert([
        ['name' => 'Aria Thorne', 'party_name' => 'The Progressive Collective', 'constituency' => 'Neo-Veridia', 'election_symbol' => 'Phoenix', 'age' => 32],
        ['name' => 'Caspian Vane', 'party_name' => 'Iron Guard Union', 'constituency' => 'Old Forge District', 'election_symbol' => 'Anvil', 'age' => 58],
        ['name' => 'Sylvia Thorne', 'party_name' => 'The Progressive Collective', 'constituency' => 'Skyreach Heights', 'election_symbol' => 'Phoenix', 'age' => 45],
        ['name' => 'Jaxson Kael', 'party_name' => 'Lunar Sovereignty', 'constituency' => 'Silver Basin', 'election_symbol' => 'Crescent', 'age' => 29],
        ['name' => 'Eleanor Vance', 'party_name' => 'Iron Guard Union', 'constituency' => 'Iron Gate Delta', 'election_symbol' => 'Anvil', 'age' => 52],
    ]);

     DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com', // Using email as 'username' for Laravel Auth
            'password' => Hash::make('user@123'),
            'user_level' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
