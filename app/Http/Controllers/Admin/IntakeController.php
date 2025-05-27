<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Intake\IntakeStoreRequest;
use App\Http\Requests\Intake\UpdateIntakeRequest;
use App\Services\Intake\IntakeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class IntakeController extends Controller
{
    protected $intakeService;

    /**
     * Inject the IntakeService.
     */
    public function __construct(IntakeService $intakeService)
    {
        $this->intakeService = $intakeService;
    }

    /**
     * Display a list of all intakes.
     */
    public function index()
    {
        $intakes = $this->intakeService->getAllIntakes();
        return view('admin.academic.Intake', compact('intakes'));
    }

    /**
     * Show the form for creating a new intake.
     */
    public function create()
    {
        return view('admin.academic.intake.create');
    }

    /**
     * Store a newly created intake in the database.
     */
    public function store(IntakeStoreRequest $request)
    {


        try {
            $validated = $request->validated();  // Use validated data from IntakeRequest
            $storeIntake = $this->intakeService->createIntake($validated);
            // return back()->with('success', 'Intake added successfully');

        return redirect()->route('admin.academic.intake')->with('success', 'Intake added successfully!');

            // return response()->json([
            //     'status' => 'success',
            //     'message' => 'Intake added successfully',
            //     'data' => $validated,  // Optionally, send the saved intake data
            // ]);
          } catch (\Exception $e) {
                //  Log::error('Intake save error: ' . $e->getMessage());
                //  return back()->with('error', 'An error occurred while saving intake.');
         return redirect()->route('admin.academic.intake')->with('error', 'An error occurred while saving intake.!');

        }
    }

    /**
     * Show the form for editing the specified intake.
     */
    public function edit($id)
    {
        // Get the intake data using the service
        $intakes = $this->intakeService->getIntakeById($id);
        if (!$intakes) {
        Log::warning("Intake with ID $id not found.");
        return response()->json(['message' => 'Intake not found'], 404);        }

    // Return the batch data as JSON for AJAX
    return response()->json([
        'intake_id' => $intakes->intake_id,
        'intake_name_en' => $intakes->intake_name_en,
        'intake_name_ar'=>$intakes->intake_name_ar
    ]);    }

    /**
     * Update the specified intake in the database.
     */
    public function update(UpdateIntakeRequest $request)
    {

    // $intake = Intake::find($this->route('intake_id'));
    // $intake = Intake::find($request->input('intake_id'));
        // dd($request->validated());

        try {
            // Get validated data from the request
            $validated = $request->validated();

            $id = $request->validated('intake_id');  // Get the intake ID from the request
            // Call the service method to update the intake
            $intake = $this->intakeService->updateIntake($id, $validated);

            return redirect()->route('admin.academic.intake')->with('success', 'Intake updated successfully!');

            // If update successful, redirect with success message
            // return response()->json([
            //     'status' => 'success',
            //     'message' => 'Intake updated successfully',
            //     'data' => $intake,  // Optionally, send the saved intake data
            // ]);

        } catch (\Exception $e) {
            // Handle any errors during the update process
            // return back()->with('error', 'Failed to update intake.');
            return redirect()->route('admin.academic.intake')->with('error', 'An error occurred while updating intake.');

        }
    }

    /**
     * Remove the specified intake from the database.
     */
    public function destroy($id)
    {
        try {
            // Call the service method to delete the intake
            $deleted = $this->intakeService->deleteIntake($id);

            if ($deleted) {

           return redirect()->route('admin.academic.intake')->with('success', 'Intake deleted successfully!');
                // return response()->json([
                //     'status' => 'success',
                //     'message' => 'Intake deleted successfully',
                 // ]);
        }
            // If intake not found, redirect with error message
            return redirect()->route('admin.academic.intake')->with('error', 'Intake not found or already deleted!');
        } catch (\Exception $e) {
            // Handle errors during the deletion process
            Log::error('Intake deletion error: ' . $e->getMessage());
            return redirect()->route('admin.academic.intake')->with('error', 'An error occurred while deleting intake.');

            }
    }
}
