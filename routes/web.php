<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\TestController;


//Clear All route
Route::get('/clear-all', function () {

    Artisan::call('optimize');
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');

    return 'Caching, routes, and configuration cleared successfully.';
})->name('clear-all');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('test');
});


Route::prefix('test')->group(function () {
    Route::get('/', [TestController::class, 'index'])->name('test');
});