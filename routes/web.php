<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProjectsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::group(['middleware' => ['isLoggedIn']], function () {
    Route::get('/student-dashboard', [StudentsController::class,'index'])->name('student-dashboard');
    Route::get('/staff-dashboard', [StaffController::class,'index'])->name('staff-dashboard');
    Route::get('/coordinator-dashboard', [StaffController::class,'indexCoordinator'])->name('coordinator-dashboard');
    Route::post('/project-create', [ProjectsController::class,'store'])->name('project-create');
    Route::get('/student-detail', [StudentsController::class,'detail'])->name('student-detail');
    Route::get('/staff-detail', [StaffController::class,'detail'])->name('staff-detail');
    Route::get('/staff-supervisor', [StaffController::class,'supervisor'])->name('staff-supervisor');
    Route::get('/staff-examiner', [StaffController::class,'examiner'])->name('staff-examiner');
    Route::get('/staff-coordinator', [ProjectsController::class,'create'])->name('staff-coordinator');
    Route::get('/project-detail/{id}', [ProjectsController::class,'edit', 'id' => 'id'])->name('project-detail');
    Route::post('/project-update', [ProjectsController::class,'update'])->name('project-update');
    Route::get('/project-show/{id}', [ProjectsController::class,'show', 'id' => 'id'])->name('project-show');
    //Route::resource('project',ProjectsController::class);
});
Route::get('/login-student', [StudentsController::class,'login'])->name('login-student');
Route::get('/register-student', [StudentsController::class,'create'])->name('register-student');;
Route::post('/student-registerP', [StudentsController::class,'store'])->name('student-registerP');
Route::post('/student-loginP', [StudentsController::class,'loginP'])->name('student-loginP');
Route::post('/staff-registerP', [StaffController::class,'store'])->name('staff-registerP');
Route::get('/login-staff', [StaffController::class,'login'])->name('login-staff');
Route::get('/register-staff', [StaffController::class,'create'])->name('register-staff');
Route::post('/staff-loginP', [StaffController::class,'loginP'])->name('staff-loginP');


Route::get('/logout', [StudentsController::class,'logout'])->name('logout');


