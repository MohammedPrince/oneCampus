<?php

namespace App\Providers;
use App\Repositories\Employee\EmployeeRepository;
use App\Repositories\Faculty\FacultyRepository;
use App\Repositories\User\UserRepository;
use App\Services\Batch\BatchService;
use App\Services\Employee\EmployeeServices;
use App\Services\Faculty\FacultyServices;
use App\Services\Intake\IntakeService;
use App\Services\Major\MajorService;
use App\Services\User\UserServices;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
         UserServices::class,
         UserServices::class,
        );
        $this->app->bind(EmployeeServices::class, EmployeeServices::class);
        $this->app->bind(FacultyServices::class, FacultyServices::class);
        $this->app->bind(MajorService::class, MajorService::class);
        $this->app->bind(BatchService::class, BatchService::class);
        $this->app->bind(IntakeService::class, IntakeService::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
