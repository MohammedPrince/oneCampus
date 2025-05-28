<?php


namespace App\Repositories\Major;

use App\Http\Controllers\Admin\MajorControl;
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


    public function find($major)
    {
        return Major::findOrFail($major);
    }

    
public function store(array $data)
{

    // dd($data);
    $exists = Major::where('major_name_en', $data['major_name_en'])
        ->where('major_name_ar', $data['major_name_ar'])
        ->where('major_abbreviation', $data['major_abbreviation'])
        ->where('major_ministry_code', $data['major_ministry_code'] ?? null)
        ->exists();

    if ($exists) {
        return "exists";
    }

    Major::create($data);
    return "success";
}


    public function update($major, array $data)
    {
        return $major->update($data);
    }

    public function delete($major)
    {
        return $major->delete();
    }


}
