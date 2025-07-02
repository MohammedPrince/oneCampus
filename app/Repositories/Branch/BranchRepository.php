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

            $exists = Branch::where('branch_name_ar', $data['branch_name_ar'])
            ->where('branch_name_en', $data['branch_name_en'])
            ->exists();

        if ($exists) {
            return "exists";
        } else {
            Branch::create($data);
            return "success";
        }
    
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
