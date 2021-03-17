<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\__UNIVERSAL;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;

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


Auth::routes();

// Route::get('/', function () {

//     return view('welcome');

// });


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/UNIV/FETCHDATA/{data}', [__UNIVERSAL::class, '__FETCHDATA']);

Route::get('/UNIV/SHOW/{data}', [__UNIVERSAL::class, '__SHOW']);

Route::post('/UNIV/INSERT', [__UNIVERSAL::class, '__INSERT']);

Route::get('/UNIV/EDIT', [__UNIVERSAL::class, '__EDIT']);

Route::post('/UNIV/EDIT', [__UNIVERSAL::class, '__EDIT']);

Route::get('/UNIV/DELETE', [__UNIVERSAL::class, '__DELETE']);

Route::post('/UNIV/DELETE', [__UNIVERSAL::class, '__DELETE']); 

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/dashboard/clearance', [DashboardController::class, 'clearance']);

Route::get('/dashboard/campus', [DashboardController::class, 'campus']);

Route::get('/dashboard/student', [DashboardController::class, 'student']);

Route::get('/dashboard/student/sheets', [DashboardController::class, 'StudentSheets']);

Route::get('/dashboard/student/clearance/information', [DashboardController::class, 'ClearanceInformation']);

Route::get('/dashboard/librarian/students/sheets', [DashboardController::class, 'StudentSheets']);

Route::get('/dashboard/librarian/students/required', [DashboardController::class, 'RequiredStudents']);

Route::get('/dashboard/librarian/students/completed', [DashboardController::class, 'RequiredStudents']);

Route::get('/dashboard/department', [DashboardController::class, 'department']);

Route::get('/dashboard/excel/templates', [DashboardController::class, 'templates']);

Route::get('/dashboard/import', [DashboardController::class, 'importFile']);

Route::post('/dashboard/import', [DashboardController::class, 'importExcel']);

Route::get('/', [PageController::class, 'index']);