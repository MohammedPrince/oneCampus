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
        // return BatchControl::create($data);

    $exists = BatchControl::where('batch', $data['batch'])
                ->where('faculty_id', $data['faculty_id'])
                ->where('major_id', $data['major_id'])
                ->where('branch_id', $data['branch_id'])
                ->where('graduate_status', $data['graduate_status'])
                ->where('max_sem', $data['max_sem'])
                ->where('active_sem', $data['active_sem'])
                ->exists();

    if ($exists) {
        return "exists";
    }else{

        $batch = BatchControl::create($data);
        return $batch;
    }



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
