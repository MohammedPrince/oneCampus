<?php

namespace App\Repositories\Intake;
use App\Models\IntakeControl;




use App\Models\Intake;

class IntakeRepository
{
    /**
     * Get all intakes.
     */
    public function all()
    {
        return Intake::all();
    }

    /**
     * Find an intake by ID.
     */
  public function findById(int $id)
{
    return Intake::findOrFail($id);
}


    /**
     * Create a new intake.
     */
    public function create(array $data)
    {


// dd($data);
        // Check for duplicate first
$exists = Intake::where('intake_name_en', $data['intake_name_en'])
    ->where('intake_name_ar', $data['intake_name_ar'])
    ->exists();

    if ($exists) {
        return "exists";
    }else{
        // Create intake only if not exists
        Intake::create($data);
        return "success";

    }

    }

    /**
     * Update an existing intake.
     */
    public function update(int $id, array $data)
    {
        $intake = Intake::find($id);
        if ($intake) {
            $intake->update($data);
            return $intake;
        }
        return null;
    }

    /**
     * Delete an intake.
     */
    public function delete(int $id)
    {
        $intake = Intake::find($id);
        if ($intake) {
            return $intake->delete(); // Soft delete if enabled
        }
        return false;
    }
}
