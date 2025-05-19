<?php

namespace App\Repositories\Batch;

use App\Models\BatchControl;
use App\Models\Branch;
use App\Models\Faculty;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class BatchRepository 
{
    public function getAll(): Collection
    {
        $batches = BatchControl::with(['faculty', 'major', 'branch'])->get();
       
        return $batches;

    }
    public function getAllBranch(){
       return  Branch::all();
    }
    public function getAllFaculty(){
        return $faculties = Faculty::all();
    }
    public function find(int $id)
    {
        return BatchControl::find($id);
    }

    public function create(array $data)
    {
        return BatchControl::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $batch = $this->find($id);
        return $batch ? $batch->update($data) : false;
    }

    public function delete(int $id): bool
    {
        $batch = $this->find($id);
        return $batch ? $batch->delete() : false;
    }
}
