<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_faculty')->insert([
            [
                'faculty_id' => 1,
                'faculty_name_en' => 'computer',
                'faculty_name_ar' => 'علوم',
                'abbreviation' => 'dcsdde',
                'branch_id' => 1,
                'status' => 1,
                'created_at' => Carbon::parse('2025-05-22 07:26:31'),
                'updated_at' => Carbon::parse('2025-05-22 08:36:51'),
                'deleted_at' => Carbon::parse('2025-05-22 08:36:51'),
            ],
            [
                'faculty_id' => 2,
                'faculty_name_en' => 'information Technology',
                'faculty_name_ar' => 'تقنية معلومات',
                'abbreviation' => 'IT',
                'branch_id' => 3,
                'status' => 1,
                'created_at' => Carbon::parse('2025-05-22 08:39:03'),
                'updated_at' => Carbon::parse('2025-05-22 08:39:03'),
                'deleted_at' => null,
            ],
            [
                'faculty_id' => 3,
                'faculty_name_en' => 'computer Sciaena',
                'faculty_name_ar' => 'علوم حاسوب',
                'abbreviation' => 'Sci',
                'branch_id' => 2,
                'status' => 1,
                'created_at' => Carbon::parse('2025-05-22 08:39:34'),
                'updated_at' => Carbon::parse('2025-05-22 08:39:34'),
                'deleted_at' => null,
            ],
        ]);
    }
}
