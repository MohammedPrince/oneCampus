<?php

namespace App\Services\Branch;

use App\Repositories\Branch\BranchRepository;

class BranchService
{
    protected $branchRepo;

    public function __construct(BranchRepository $branchRepo)
    {
        $this->branchRepo = $branchRepo;
    }

    public function all()
    {
        return $this->branchRepo->all();
    }
   public function countryAll(){
            return $this->branchRepo->countryAll();

   }
    public function store(array $data)
    {
        return $this->branchRepo->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->branchRepo->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->branchRepo->delete($id);
    }

    public function findById(int $id)
    {
        return $this->branchRepo->findById($id);
    }
}
