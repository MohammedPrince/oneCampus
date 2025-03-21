<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\CheckRole;

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
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('admin.role');
Route::get('register', [AuthController::class, 'showRegister'])->name('admin.register');
Route::post('authenticate', [AuthController::class, 'register'])->name('admin.authenticate');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');


// Authentication Routes
Route::prefix('admin')->middleware(CheckRole::class.':admin')->group(function () {
Route::get('dashboard', [AuthController::class, 'index'])->name('admin/dashboard');
Route::get('user/add',[AuthController::class,'addUser'])->name('user.add');
Route::get('user/list',[AuthController::class,'userList'])->name('user.list');
Route::get('user/reset',[AuthController::class,'userReset'])->name('user.reset');
Route::get('/role',[AuthController::class,'adminRole'])->name('admin.role_manage');
Route::get('/rules/list',[AuthController::class,'manageRole'])->name('admin.rule.list');
Route::get('/rules/departments',[AuthController::class,'manageDept'])->name('admin.rule.dept');
Route::get('/rules/branch',[AuthController::class,'manageBranch'])->name('admin.rule.branch');
Route::get('/rules/identity',[AuthController::class,'manageIdentity'])->name('admin.rule.identity');
Route::get('/academic/certificate',[AuthController::class,'manageCertificate'])->name('admin.academic.certificate');
Route::get('/academic/major',[AuthController::class,'manageMajor'])->name('admin.academic.major');
Route::get('/academic/batch',[AuthController::class,'manageBatch'])->name('admin.academic.batch');
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
