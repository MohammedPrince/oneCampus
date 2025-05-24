<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\FacultyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\BatchController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\IntakeController;
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\PasswordResetController;
use App\Http\Controllers\TestController;

use App\Http\Middleware\CheckRole;
use App\Http\Middleware\LoginCheck;


//Clear All route
Route::get('/clear-all', function () {

    Artisan::call('optimize');
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');

    return 'Caching, routes, and configuration cleared successfully.';
})->name('clear-all');

//Testing Route

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('login');
});


Route::prefix('test')->group(function () {
    Route::get('/', [TestController::class, 'index'])->name('test');
});
// Route::middleware('guest')->group(function () {
//     Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
//     Route::post('/login', [AuthController::class, 'login'])->name('admin.role');;
// });

// Route::get('login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest')->name('login');

Route::get('login', [AuthController::class, 'showLogin'])->name('login')->middleware('loginCheck');

Route::post('login', [AuthController::class, 'login'])->name('admin.role');

Route::get('register', [AuthController::class, 'showRegister'])->name('admin.register');
Route::post('authenticate', [AuthController::class, 'register'])->name('admin.authenticate');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');


// Authentication Routes
Route::prefix('admin')->middleware(CheckRole::class.':admin')->group(function () {
// Show reset form
Route::get('user/reset', [PasswordResetController::class, 'showForm'])->name('user.reset');

// Handle password reset form submission
Route::post('user/reset', [PasswordResetController::class, 'resetPassword'])->name('user.reset.password');

Route::get('dashboard', [AuthController::class, 'index'])->name('admin/dashboard');
Route::get('user/add',[AuthController::class,'addUser'])->name('user.add');
Route::get('user/list',[EmployeeController::class,'index'])->name('user.list');
Route::get('user/edit/{id}', [EmployeeController::class, 'edit'])->name('user.edit');
// Route::put('/user/{id}', [EmployeeController::class, 'update'])->name('user.update');
Route::post('/user/update', [EmployeeController::class, 'update'])->name('user.update');
Route::delete('user/delete/{id}', [EmployeeController::class, 'destroy'])->name('user.delete');
Route::get('user/show/{employee_id}', [EmployeeController::class, 'show'])->name('user.show');
Route::get('user/reset',[AuthController::class,'userReset'])->name('user.reset');
Route::post('/upload-employees', [EmployeeController::class, 'uploadEmployees'])->name('employees.upload');

Route::get('/role',[AuthController::class,'adminRole'])->name('admin.role_manage');
Route::get('/rule/list',[AuthController::class,'manageRole'])->name('admin.rule.list');
Route::get('/rule/departments',[FacultyController::class,'index'])->name('admin.rule.dept');
Route::resource('faculty', FacultyController::class)->names([

    'index' => 'faculty.index',
    'store' => 'faculty.store',
    // 'update' => 'faculty.update',
]);

Route::post('/rule/departments/update/{id}',[FacultyController::class,'update'])->name('admin.update.dep');


Route::get('/rule/departments/{facultyId}',[FacultyController::class,'destroy'])->name('admin.rule.departments.destroy');

Route::get('/rule/branch', [BranchController::class, 'index'])->name('admin.rule.branch');
Route::get('/rule/branch/{id}', [BranchController::class, 'edit'])->name('admin.rule.branch.edit');
Route::post('/rule/branch/', [BranchController::class, 'store'])->name('admin.rule.branch.store');
// Route::put('/rule/branch/update/{id}', [BranchController::class, 'update'])->name('admin.rule.branch.update');
Route::post('/rule/branch/update', [BranchController::class, 'update'])->name('admin.rule.branch.update');

// Route::delete('/rule/branch/{id}', [BranchController::class, 'destroy'])
//     ->name('admin.rule.branch.destroy');

Route::get('/rule/branch/update/{id}', [BranchController::class, 'destroy'])
    ->name('admin.branch.destroy');

  // Display majors page
  Route::get('academic/major', [MajorController::class, 'index'])->name('admin.academic.major');
  Route::get('academic/major/data', [MajorController::class, 'getMajorData'])->name('admin.academic.major.data'); // AJAX data endpoint

  // Store a new major
  Route::post('academic/major', [MajorController::class, 'store'])->name('admin.academic.major.store');

  // Show the edit form for a specific major
  Route::get('academic/major/{id}/edit', [MajorController::class, 'edit'])->name('admin.academic.major.edit');

  // Update the major
  Route::post('academic/major/update', [MajorController::class, 'update'])->name('admin.academic.major.update');

  // Delete a major
//   Route::delete('academic/major/delete/{id}', [MajorController::class, 'destroy'])->name('admin.academic.major.destroy');
  Route::get('academic/major/delete/{id}', [MajorController::class, 'destroy'])->name('admin.academic.major.destroy');


  Route::get('/academic/faculty/{id}/majors', [MajorController::class, 'getMajorsByFaculty'])->name('admin.faculty.major.id');



  // Route (in your routes/web.php)
    Route::get('/faculty', function () {
        return response()->json(\App\Models\Faculty::all());
    });

  Route::get('/academic/batch', [BatchController::class, 'index'])->name('admin.academic.batch');
  Route::get('/academic/batch/fetch', [BatchController::class, 'fetch'])->name('admin.academic.batch.fetch');
  Route::post('/academic/batch', [BatchController::class, 'store'])->name('admin.academic.batch.store');
  Route::get('/academic/batch/{id}/edit', [BatchController::class, 'edit'])->name('admin.academic.batch.edit');
  Route::get('/academic/batch/{id}', [BatchController::class, 'getBatchById'])->name('admin.academic.batch.fetch.id');
//   Route::put('/academic/batch/{id}', [BatchController::class, 'update'])->name('admin.academic.batch.update');
  Route::post('/academic/batch/update', [BatchController::class, 'update'])->name('admin.academic.batch.update');

//   Route::delete('/academic/batch/{id}', [BatchController::class, 'destroy'])->name('admin.academic.batch.destroy');
  Route::get('/academic/batch/{id}', [BatchController::class, 'destroy'])->name('admin.academic.batch.destroy');

  Route::get('/academic/intake', [IntakeController::class, 'index'])->name('admin.academic.intake');
  Route::get('intake/create', [IntakeController::class, 'create'])->name('admin.academic.intake.create');
  Route::post('academic/intake/store', [IntakeController::class, 'store'])->name('admin.academic.intake.store');

  Route::get('academic/intake/{id}/edit', [IntakeController::class, 'edit'])->name('admin.academic.intake.edit');
  Route::post('academic/intake/update', [IntakeController::class, 'update'])->name('admin.academic.intake.update');

//   Route::put('academic/intake/update/{id}', [IntakeController::class, 'update'])->name('admin.academic.intake.update');
//   Route::delete('academic/intake/{id}', [IntakeController::class, 'destroy'])->name('admin.academic.intake.destroy');
  Route::get('academic/intake/{id}', [IntakeController::class, 'destroy'])->name('admin.academic.intake.destroy');

//   Route::get('/rules/identity',action: [AuthController::class,'manageIdentity'])->name('admin.rule.identity');
Route::get('/academic/certificate',action: [AuthController::class,'manageCertificate'])->name('admin.academic.certificate');
//  Route::get('/academic/major',[AuthController::class,'manageMajor'])->name('admin.academic.major');
Route::get('/academic/batch',[AuthController::class,'manageBatch'])->name('admin.academic.batch');
// Route::get('/academic/intake',[AuthController::class,'manageIntake'])->name('admin.academic.intake');
Route::resource('employee', controller: EmployeeController::class);
//get branch
Route::get('/academic/batch', [BatchController::class, 'getData'])->name('admin.academic.batch');
//getuserdata
Route::get('/user/add', [EmployeeController::class, 'getUserData'])->name('user.add');

});

Route::prefix('student')->middleware('role:student')->group(function () {
    Route::get('/', [AuthController::class, 'show'])->name('student/student');
});
Route::prefix('parent')->middleware('role:parent')->group(function () {
    Route::get('/', [AuthController::class, 'parent'])->name('parent/dashboard');

});
Route::prefix('agent')->middleware('role:agent')->group(function () {
    Route::get('/', [AuthController::class, 'agent'])->name('agent/dashboard');

});
Route::prefix('clinic')->middleware('role:clinic')->group(function () {
    Route::get('/', [AuthController::class, 'clinic'])->name('clinic/dashboard');

});
Route::prefix('dean')->middleware('role:dean')->group(function () {
    Route::get('/', [AuthController::class, 'dean'])->name('dean/dashboard');

});
Route::prefix('admission-user')->middleware('role:admission-user')->group(function () {
    Route::get('/', [AuthController::class, 'admissionUser']);

});
Route::prefix('admission-admin')->middleware('role:admission-admin')->group(function () {
    Route::get('/', [AuthController::class, 'admissionAdmin']);

});
Route::prefix('registrar')->middleware('role:registrar')->group(function () {
    Route::get('/', [AuthController::class, 'registrar']);

});
Route::prefix('exam-officer')->middleware('role:exam-officer')->group(function () {
    Route::get('/', [AuthController::class, 'examOfficer']);

});
Route::prefix('finance')->middleware('role:finance')->group(function () {
    Route::get('/', [AuthController::class, 'finance']);

});
