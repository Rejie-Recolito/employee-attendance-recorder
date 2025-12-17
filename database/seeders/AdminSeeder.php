<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure the users table exists
        if (!Schema::hasTable('users')) {
            return;
        }

        // Create admin user if not exists
        $adminEmail = 'admin@example.com';
        if (!User::where('email', $adminEmail)->exists()) {
            User::create([
                'first_name' => 'Admin',
                'middle_name' => '',
                'last_name' => 'User',
                'user_name' => 'admin',
                'email' => $adminEmail,
                'password' => Hash::make('admin123'),
                'phone_number' => '1234567890',
                'profile_photo' => null,
                'user_type' => 'admin',
                'date_of_birth' => '1990-01-01',
                'place_of_birth' => 'HQ',
                'age' => 35,
                'sex' => 'Male',
                'address' => 'Admin Office',
                'job_title' => 'Administrator',
                'department' => 'Management',
                'status' => 'Active',
                'date_of_service' => '2020-01-01',
                'salary' => 100000,
            ]);
        }
    }
}
