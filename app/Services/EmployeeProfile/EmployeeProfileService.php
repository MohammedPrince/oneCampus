<?php
namespace App\Services\EmployeeProfile;

use App\Repositories\EmployeeProfile\EmployeeProfileRepository;

class EmployeeProfileService
{
    protected $profileRepo;

    public function __construct(EmployeeProfileRepository $profileRepo)
    {
        $this->profileRepo = $profileRepo;
    }

    public function all()
    {
        return $this->profileRepo->all();
    }

    public function store(array $data)
    {
        return $this->profileRepo->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->profileRepo->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->profileRepo->delete($id);
    }

    public function findById(int $id)
    {
        return $this->profileRepo->findById($id);
    }
}
