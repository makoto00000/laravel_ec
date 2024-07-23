<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
            [
                'name' => 'test-owner1',
                'email' => 'test-owner1@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2024/07/16 11:11:11'
            ],
            [
                'name' => 'test-owner2',
                'email' => 'test-owner2@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2024/07/16 11:11:11'
            ],
            [
                'name' => 'test-owner3',
                'email' => 'test-owner3@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2024/07/16 11:11:11'
            ],
            [
                'name' => 'test-owner4',
                'email' => 'test-owner4@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2024/07/16 11:11:11'
            ],
            [
                'name' => 'test-owner5',
                'email' => 'test-owner5@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2024/07/16 11:11:11'
            ],
            [
                'name' => 'test-owner6',
                'email' => 'test-owner6@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2024/07/16 11:11:11'
            ],
        ]);
    }
}
