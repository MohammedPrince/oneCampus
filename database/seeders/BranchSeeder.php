<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

      DB::table('tbl_branch')->insert([
            [

                'branch_name_ar' => 'علوم',
                'branch_name_en' => 'computer',
                'country_id' => 1,
                'branch_city' => 'Port Sudan',
                'branch_address' => 'Port Sudan',
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null,
            ],
            [

                'branch_name_ar' => 'علوم حاسوب',
                'branch_name_en' => 'Compute Science',
                'country_id' => 2,
                'branch_city' => 'Cairo',
                'branch_address' => 'Cairo',
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null,
            ],
            [

                'branch_name_ar' => 'تقنية معلومات',
                'branch_name_en' => 'Information Technology',
                'country_id' => 5,
                'branch_city' => 'Kwaite',
                'branch_address' => 'kHARTOUM',
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null,
            ],
        ]);
    }
}
