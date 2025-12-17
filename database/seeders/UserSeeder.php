<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Read JSON data file
        $jsonPath = database_path('../JSON Data/users.json');
        
        if (!File::exists($jsonPath)) {
            $this->command->error('users.json file not found at: ' . $jsonPath);
            return;
        }

        $usersData = json_decode(File::get($jsonPath), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->command->error('Invalid JSON in users.json file');
            return;
        }

        $this->command->info('Starting user seeding process...');
        
        $created = 0;
        $existing = 0;

        foreach ($usersData as $userData) {
            // Use firstOrCreate to avoid duplicates based on email and user_name
            $user = User::firstOrCreate(
                [
                    'email' => $userData['email'],
                ],
                [
                    'first_name' => $userData['first_name'],
                    'middle_name' => $userData['middle_name'],
                    'last_name' => $userData['last_name'],
                    'user_name' => $userData['user_name'],
                    'password' => Hash::make($userData['password']),
                    'phone_number' => $userData['phone_number'],
                    'profile_photo' => $userData['profile_photo'],
                    'user_type' => $userData['user_type'],
                ]
            );

            if ($user->wasRecentlyCreated) {
                $created++;
                $this->command->line("Created user: {$userData['email']}");
            } else {
                $existing++;
                $this->command->line("User already exists: {$userData['email']}");
            }
        }

        $this->command->info("Seeding completed!");
        $this->command->info("Created: {$created} new users");
        $this->command->info("Existing: {$existing} users already in database");
    }
}