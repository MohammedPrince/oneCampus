<?php
namespace App\Services\Faculty;

use App\Repositories\Faculty\FacultyRepository;

class FacultyServices
{
    protected $facultyRepo;

    public function __construct(FacultyRepository $facultyRepo)
    {
        $this->facultyRepo = $facultyRepo;
    }

    public function all()
    {
        return $this->facultyRepo->all();
    }

    public function store(array $data)
    {
        return $this->facultyRepo->create($data);
    }



    public function update(int $id, array $data)
    {
        return $this->facultyRepo->update($id, $data);
    }

    public function update_data(array $data)
    {
        return $this->facultyRepo->update_data($data);
    }
    public function delete(int $id)
    {
        return $this->facultyRepo->delete($id);
    }

    public function findById(int $id)
    {
        return $this->facultyRepo->findById($id);
    }
}
