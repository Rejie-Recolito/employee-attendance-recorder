<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = database_path('../JSON Data/employees.json');
        if (!File::exists($jsonPath)) {
            $this->command->error('employees.json file not found at: ' . $jsonPath);
            return;
        }
        $employeesData = json_decode(File::get($jsonPath), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->command->error('Invalid JSON in employees.json file');
            return;
        }
        $this->command->info('Starting employee seeding process...');
        foreach ($employeesData as $employeeData) {
            Employee::firstOrCreate([
                'first_name' => $employeeData['first_name'],
                'last_name' => $employeeData['last_name'],
                'date_of_birth' => $employeeData['date_of_birth'],
            ], $employeeData);
        }
    }
}
