<?php

namespace App\Services\Intake;

use App\Repositories\Intake\IntakeRepository;

class IntakeService
{
    protected $intakeRepo;

    public function __construct(IntakeRepository $intakeRepo)
    {
        $this->intakeRepo = $intakeRepo;
    }

    public function getAllIntakes()
    {
        return $this->intakeRepo->all();
    }

    public function createIntake(array $data)
    {
        return $this->intakeRepo->create($data);
    }

    public function updateIntake(int $id, array $data)
    {
        return $this->intakeRepo->update($id, $data);
    }

    public function deleteIntake(int $id)
    {
        return $this->intakeRepo->delete($id);
    }

    public function getIntakeById(int $id)
    {
        return $this->intakeRepo->findById($id);
    }
}
