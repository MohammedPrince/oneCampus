<?php

namespace App\Repositories\Branch;

use App\Models\Branch;
use App\Models\Country;

class BranchRepository
{
    public function all()
    {
        return Branch::with('country')->get();
    }

    public function countryAll(){
        return Country::all();
    }
    public function findById($id)
    {
        return Branch::findOrFail($id);
    }

    public function create(array $data): mixed
    {
        return Branch::createBranch($data);
    }

    public function update(int $id, array $data)
    {
        $branch = Branch::findOrFail($id);
        return $branch->updateBranch($data);
    }

    public function delete(int $id)
    {
        $branch = Branch::findOrFail($id);
        return $branch->deleteBranch();
    }
}
