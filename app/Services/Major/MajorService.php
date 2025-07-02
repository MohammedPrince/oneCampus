<?php

namespace App\Services\Major;

use App\Repositories\Major\MajorRepository;

class MajorService
{
    protected $majorRepo;

    public function __construct(MajorRepository $majorRepo)
    {
        $this->majorRepo = $majorRepo;
    }

    public function getAllMajors()
    {
        return $this->majorRepo->getAll();
    }
    public function getAllFaculty(){
        return $this->majorRepo->getAllFacu();
    }
    public function createMajor(array $data)
    {
        return $this->majorRepo->store($data);
    }

    public function updateMajor($major, array $data)
    {
        return $this->majorRepo->update($major, $data);
    }

    public function deleteMajor($major)
    {
        return $this->majorRepo->delete($major);
    }

    public function findMajor($major)
    {
        return $this->majorRepo->find(major: $major);
    }
}
