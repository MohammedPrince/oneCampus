<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class IntakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('tbl_intake')->insert([
            [
                'intake_id' => 1,
                'intake_name_en' => 'first Intake',
                'intake_name_ar' => 'القبول الاول',
                'deleted_at' => null,
                'created_at' => Carbon::parse('2025-05-22 08:39:53'),
                'updated_at' => Carbon::parse('2025-05-22 08:39:53'),
            ],
            [
                'intake_id' => 2,
                'intake_name_en' => 'Second Intake',
                'intake_name_ar' => 'القبول الثاني',
                'deleted_at' => null,
                'created_at' => Carbon::parse('2025-05-22 08:40:11'),
                'updated_at' => Carbon::parse('2025-05-22 08:40:11'),
            ],
        ]);

    }
}
