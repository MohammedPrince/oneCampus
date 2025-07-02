<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('tbl_country')->insert([
            [
                'country_name_en' => 'Saudi Arabia',
                'country_name_ar' => 'المملكة العربية السعودية',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'country_name_en' => 'Egypt',
                'country_name_ar' => 'مصر',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'country_name_en' => 'United Arab Emirates',
                'country_name_ar' => 'الإمارات العربية المتحدة',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'country_name_en' => 'Jordan',
                'country_name_ar' => 'الأردن',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'country_name_en' => 'Kuwait',
                'country_name_ar' => 'الكويت',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
