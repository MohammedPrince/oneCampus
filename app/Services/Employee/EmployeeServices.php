<?php
namespace App\Services\Employee;

use App\Repositories\Employee\EmployeeRepository;
use Illuminate\Support\Facades\Log;
use App\Models\EmployeeMainInfo;
use App\Models\EmployeeProfile;

class EmployeeServices
{
    protected $employeeRepo;

    public function __construct(EmployeeRepository $employeeRepo)
    {
        $this->employeeRepo = $employeeRepo;
    }
   public function getFaculty(){
    return $this->employeeRepo->getFaculty();
   }
   public function getAllBranch(){
    return $this->employeeRepo->getAllBranch();
   }
    public function listEmployees()
    {
        return $this->employeeRepo->getAll();
    }

    public function getEmployee($id)
    {
        return $this->employeeRepo->findById($id);
    }

    public function createEmployee(array $data)
    {
        return $this->employeeRepo->create($data);
    }

    public function updateEmployee(array $data, $id)
    {
            $employee = EmployeeMainInfo::findOrFail($id);
    $employee->update($data);

    if (isset($data['cv']) || isset($data['certificates'])) {
        $employee->profile()->update([
            'cv' => $data['cv'] ?? $employee->profile->cv,
            'certificates' => $data['certificates'] ?? $employee->profile->certificates,
        ]);
    }

    return $employee->fresh();

        // return $this->employeeRepo->update($data, $id);
    }

    public function deleteEmployee($id)
    {
        return $this->employeeRepo->delete($id);
    }

    public function getRoles()
    {
        return $this->employeeRepo->getRoles();
    }
     public function bulkUpload($file): array
    {
        $successCount = 0;
        $errorCount = 0;
        $chunkSize = 100;
        $rows = [];

        $path = $file->getRealPath();
        $handle = fopen($path, 'r');
        if (!$handle) {
            throw new \Exception('Cannot open the file.');
        }

        $header = fgetcsv($handle, 0, ';');
        if (!$header) {
            throw new \Exception('CSV header is missing.');
        }

        while (($row = fgetcsv($handle, 0, ';')) !== false) {
            $data = array_combine($header, $row);
            if (!$data) {
                $errorCount++;
                continue;
            }

            $rows[] = $data;

            if (count($rows) >= $chunkSize) {
                $this->processEmployeeChunk($rows, $successCount, $errorCount);
                $rows = [];
            }
        }

        if (count($rows)) {
            $this->processEmployeeChunk($rows, $successCount, $errorCount);
        }

        fclose($handle);

        return ['success' => $successCount, 'error' => $errorCount];
    }

    protected function processEmployeeChunk(array $rows, &$successCount, &$errorCount)
    {
        foreach ($rows as $data) {
            try {
                $gender = strtolower(trim($data['gender'] ?? ''));
                $allowedGenders = ['male', 'female', 'm', 'f'];
                if (!in_array($gender, $allowedGenders)) {
                    $gender = null;
                }

                // Insert into main info
                $main = EmployeeMainInfo::create([
                    'full_name_ar'     => $data['full_name_ar'] ?? null,
                    'full_name_en'     => $data['full_name_en'] ?? null,
                    'phone_number'     => $data['phone_number'] ?? null,
                    'personal_email'   => $data['personal_email'] ?? null,
                    'corporate_email'  => $data['corporate_email'] ?? null,
                    'branch_id'        => $data['branch_id'] ?? null,
                    'department_id'    => $data['department_id'] ?? null,
                    'user_id'          => $data['user_id'] ?? null,
                ]);

                EmployeeProfile::create([
                    'employee_id'               => $main->employee_id,
                    'gender'                    => $gender,
                    'nationality'               => $data['nationality'] ?? null,
                    'date_of_birth'             => $data['date_of_birth'] ?? null,
                    'whatsapp_number'           => $data['whatsapp_number'] ?? null,
                    'role'                      => $data['role'] ?? null,
                    'biometric'                 => $data['biometric']?? null,
                    'hire_date'                 => $data['hire_date'] ?? null,
                    'identification_id_type'    => $data['identification_id_type'] ?? null,
                    'identification_id'         => $data['identification_id'] ?? null,
                ]);

                $successCount++;
            } catch (\Exception $e) {
                $errorCount++;
                Log::error('CSV row insert error', [
                    'row' => $data,
                    'message' => $e->getMessage(),
                ]);
            }
        }
    }

}
