<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[BackendController::class,'admin'] )->name('admin');

//skill_details start
Route::get('/skill_details_index', [SkillsController::class, 'index'])->name('skill_details_index');
Route::get('/skill_details_create', [SkillsController::class, 'create'])->name('skill_details_create');
Route::post('/skill_details_store', [SkillsController::class, 'store'])->name('skill_details_store');
Route::get('/skill_details_edit/{id}', [SkillsController::class, 'edit'])->name('skill_details_edit');
Route::post('/skill_details_update/{id}', [SkillsController::class, 'update'])->name('skill_details_update');
Route::get('/skill_details_delete/{id}', [SkillsController::class, 'delete'])->name('skill_details_delete');
//skill_details start

//employee_details start
Route::get('/employee_details_index', [EmployeesController::class, 'index'])->name('employee_details_index');
Route::get('/employee_details_create', [EmployeesController::class, 'create'])->name('employee_details_create');
Route::post('/employee_details_store', [EmployeesController::class, 'store'])->name('employee_details_store');
Route::get('/employee_details_view/{id}', [EmployeesController::class, 'view'])->name('employee_details_view');
Route::get('/employee_details_edit/{id}', [EmployeesController::class, 'edit'])->name('employee_details_edit');
Route::post('/employee_details_update/{id}', [EmployeesController::class, 'update'])->name('employee_details_update');
Route::get('/employee_details_delete/{id}', [EmployeesController::class, 'delete'])->name('employee_details_delete');
//employee_details end


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
