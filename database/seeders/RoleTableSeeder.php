<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $roles = [
            ['name' => 'Admin', 'slug' => 'admin'],
            ['name' => 'Student', 'slug' => 'student'],
            ['name' => 'Parent', 'slug' => 'parent'],
            ['name' => 'Agent', 'slug' => 'agent'],
            ['name' => 'Clinic', 'slug' => 'clinic'],
            ['name' => 'Dean', 'slug' => 'dean'],
            ['name' => 'Admission User', 'slug' => 'admission-user'],
            ['name' => 'Admission Admin', 'slug' => 'admission-admin'],
            ['name' => 'Registrar', 'slug' => 'registrar'],
            ['name' => 'Exam Officer', 'slug' => 'exam-officer'],
            ['name' => 'Finance', 'slug' => 'finance'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
