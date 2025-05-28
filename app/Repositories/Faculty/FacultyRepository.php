<?php

namespace App\Repositories\Faculty;

use App\Models\Faculty;

class FacultyRepository
{
    public function all()
    {
        return Faculty::with('branch')->get();
    }

    public function findById($id)
    {
        return Faculty::with('branch')->findOrFail($id);
    }

    public function create(array $data)
    {
        $exists = Faculty::where('faculty_name_en', $data['faculty_name_en'])
            ->where('faculty_name_ar', $data['faculty_name_ar'])
            ->where('abbreviation', $data['abbreviation'])
            ->where('branch_id', $data['branch_id'])
            ->exists();

        if ($exists) {
            return "exists";
        } else {
            // Create intake only if not exists
            Faculty::create($data);
            return "success";
        }
    }

    public function update(int $id, array $data)
    {
        $faculty = Faculty::findOrFail($id);
        return $faculty->update($data);
    }

    public function update_data(array $data)
    {
        $faculty = Faculty::findOrFail($data['faculty_id']);
        return $faculty->update($data);
    }

    public function delete(int $id)
    {
        $faculty = Faculty::findOrFail($id);
        return $faculty->delete();
    }
}
