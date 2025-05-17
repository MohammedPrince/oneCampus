<?php


namespace App\Repositories\Major;

use App\Models\Faculty;
use App\Models\Major;

class MajorRepository 
{
    public function getAll()
    {
        return Major::with('faculty')->get();
    }
    public function getAllFacu(){
        return Faculty::all();
    }
    public function store(array $data)
    {
        return Major::create($data);
    }

    public function update($major, array $data)
    {
        return $major->update($data);
    }

    public function delete($major)
    {
        return $major->delete();
    }

    public function find($major)
    {
        return Major::findOrFail($major);
    }
}
