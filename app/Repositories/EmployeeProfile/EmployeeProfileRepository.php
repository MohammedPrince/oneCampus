<?php
namespace App\Repositories\EmployeeProfile;

use App\Models\EmployeeProfile;

class EmployeeProfileRepository
{
    public function all()
    {
        
        return EmployeeProfile::all();
    }

    public function findById($id)
    {
        return EmployeeProfile::findOrFail($id);
    }

    public function create(array $data)
    {
        return EmployeeProfile::createProfile($data);
    }

    public function update(int $id, array $data)
    {
        $profile = EmployeeProfile::findOrFail($id);
        return $profile->updateProfile($data);
    }

    public function delete(int $id)
    {
        $profile = EmployeeProfile::findOrFail($id);
        return $profile->deleteProfile();
    }
}
