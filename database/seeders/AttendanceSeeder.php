<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AttendanceSeeder extends Seeder
{
    
    public function run(): void
    {
        $json = File::get(database_path('../JSON Data/attendance.json'));
        $data = json_decode($json, true);
        DB::table('attendance')->insert($data);
    }
}
