<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        
        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
            EmployeeSeeder::class,
            AttendanceSeeder::class,
        ]);
        
        
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'first_name' => 'Test',
                'middle_name' => '',
                'last_name' => 'User',
                'user_name' => 'testuser',
                'password' => bcrypt('password'),
                'phone_number' => '1234567890',
                'profile_photo' => null,
                'user_type' => 'user',
            ]
        );
    }
}
