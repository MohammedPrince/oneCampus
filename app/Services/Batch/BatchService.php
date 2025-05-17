<?php

namespace App\Services\Batch;

use App\Repositories\BatchRepositoryInterface;
use App\Models\BatchControl;
use App\Repositories\Batch\BatchRepository;

class BatchService
{
    protected $batchRepository;

    public function __construct(BatchRepository $batchRepository)
    {
        $this->batchRepository = $batchRepository;
    }
 /**
     * Get a batch by its ID
     *
     * @param int $id
     * @return BatchControl|null
     */
    public function getBatchById($id)
    {
        // Fetch the batch by id
        $batch = BatchControl::find($id);

        // If batch is not found, return null (or you can return an empty object if preferred)
        if (!$batch) {
            return null;
        }

        return $batch;
    }

    public function getAllBatches()
    {
        return $this->batchRepository->getAll();
    }

    public function createBatch(array $data)
    {
        return $this->batchRepository->create($data);
    }

    public function updateBatch(int $id, array $data): bool
    {
        return $this->batchRepository->update($id, $data);
    }

    public function deleteBatch(int $id): bool
    {
        return $this->batchRepository->delete($id);
    }
}
