<?php


use App\Http\Controllers\Admin;
use App\Http\Controllers\Tutor;
use Illuminate\Support\Facades\Route;

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
// admin routes
Route::prefix('admin')->as('admin.')->group(function (){
    Route::get('/login', [Admin\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [Admin\AuthController::class, 'login'])->name('login.submit');

    Route::middleware('auth:admin')->group(function (){
        Route::post('/logout', [Admin\AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [Admin\DashboardController::class, 'dashboard'])->name('dashboard');

        Route::resource('tutors', Admin\TutorsController::class);
        Route::get('/select2-courses', [Admin\Select2Controller::class, 'getCourses']);
        Route::resource('courses', Admin\CourseController::class);
    });
});


Route::prefix('tutor')->as('tutor.')->group(function (){
    Route::get('/login', [Tutor\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [Tutor\AuthController::class, 'login'])->name('login.submit');

    Route::middleware('auth:tutor')->group(function (){
        Route::post('/logout', [Tutor\AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [Tutor\DashboardController::class, 'dashboard'])->name('dashboard');

        Route::resource('student', Tutor\StudentsController::class);
        Route::get('/select2-courses', [Tutor\Select2Controller::class, 'getCourses']);
        Route::resource('lecture', Tutor\LectureController::class);
        Route::post('/lecture/{id}/upload_file', [Tutor\LectureController::class, 'upload_file'])->name('lecture.upload-file');

    });
});
