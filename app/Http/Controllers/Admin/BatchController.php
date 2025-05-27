<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Batch\BatchStoreRequest;
use App\Http\Requests\Batch\BatchUpdateRequest;
use App\Models\BatchControl;
use App\Services\Batch\BatchService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class BatchController extends Controller
{
    protected $batchService;

    public function __construct(BatchService $batchService)
    {
        $this->batchService = $batchService;
    }

    public function getData(){
    $branches = $this->batchService->getAllBranch(); // Assuming this method exists in your BatchService
    $faculties = $this->batchService->getAllFaculty();
    $batches = $this->batchService->getAllBatches(); // Assuming this method exists in your BatchService


    return view('admin.academic.batch',compact('branches','faculties' , 'batches'));
    }
    public function index(): JsonResponse
    {
        return response()->json($this->batchService->getAllBatches());
    }
    // Add this fetch method
    public function fetch(): JsonResponse
    {
        $batches = $this->batchService->getAllBatches(); // Assuming this method exists in your BatchService
        return response()->json($batches);
    }
    public function getBatchById($id)
{
    $batch = BatchControl::find($id);

    if ($batch) {
        return response()->json($batch);
    } else {
        return response()->json(['message' => 'Batch not found'], 404);
    }
}

    public function edit($id)
    {
        $id = (int) $id; // Type cast the id to integer if it is a string

        // Fetch batch details from the service layer
        $batch = $this->batchService->getBatchById($id);

        // If no batch is found, return a 404 response
        if (!$batch) {
            return response()->json(['message' => 'Batch not found'], 404);
        }

    // Return the batch data as JSON for AJAX
    return response()->json([
        'batch_control_id' => $batch->batch_control_id,
        'batch' => $batch->batch,
        'branch_id'=>$batch->branch_id,
        'graduate_status' => $batch->graduate_status,
        'max_sem' => $batch->max_sem,
        'active_sem' => $batch->active_sem,
        'faculty_id' => $batch->faculty_id,
        'major_id' => $batch->major_id
    ]);
}


    public function store(BatchStoreRequest $request)
    // public function store(Request $request)
    {

        // dd($request->validated());

        $batch = $this->batchService->createBatch($request->validated());

        if ($batch == "exists") {
            return redirect()->route('admin.academic.batch')->with('exist', 'Batch with the same details already exists.');
        }
        return redirect()->route('admin.academic.batch')->with('success', 'Batch added successfully!');


    }

    public function update(BatchUpdateRequest $request)
    {



        $id = $request->validated('batch_control_id'); // Type cast the id to integer if it is a string

        // echo $id;
        $updated = $this->batchService->updateBatch($id, $request->validated());

        return redirect()->route('admin.academic.batch')->with('success', 'Batch updated successfully!');

        // return $updated ? response()->json(['message' => 'Batch updated successfully'])
        //                 : response()->json(['message' => 'Batch not found'], 404);
    }

    public function destroy(int $id)
    {


        $deleted = $this->batchService->deleteBatch($id);
        if ($deleted) {
            return redirect()->route('admin.academic.batch')->with('success', 'Batch deleted successfully!');
        }else {
            return redirect()->route('admin.academic.batch')->with('error', 'Batch not found!');
        }


        // return redirect()->route('admin.academic.batch')->with('success', 'Batch deleted successfully!');
        // return redirect()->route('admin.academic.batch')->with('error', 'Batch not found!');

    }
}
