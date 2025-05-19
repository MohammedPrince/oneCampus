<?php

namespace App\Http\Controllers;

use App\Http\Requests\Batch\BatchStoreRequest;
use App\Models\BatchControl;
use App\Services\Batch\BatchService;
use Illuminate\Http\JsonResponse;

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

    return view('admin.academic.batch',compact('branches','faculties'));
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


    public function store(BatchStoreRequest $request): JsonResponse
    {
        $batch = $this->batchService->createBatch($request->validated());
        return response()->json($batch, 201);
    }

    public function update(BatchStoreRequest $request, int $id): JsonResponse
    {
        $updated = $this->batchService->updateBatch($id, $request->validated());
        return $updated ? response()->json(['message' => 'Batch updated successfully'])
                        : response()->json(['message' => 'Batch not found'], 404);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->batchService->deleteBatch($id);
        return $deleted ? response()->json(['message' => 'Batch deleted successfully'])
                        : response()->json(['message' => 'Batch not found'], 404);
    }
}
