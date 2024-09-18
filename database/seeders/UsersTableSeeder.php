<?php

namespace Database\Seeders;

use App\Utility\StringUtility;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin ',
            'email' => 'tech@dflex.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // use bcrypt for hashing password
            'remember_token' => StringUtility::generateRandomString(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
