<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\UserController;

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
});

Route::get('/home', 'App\Http\Controllers\WelcomeController@home')->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    if (Auth::user()->role_id == 1) {
        return redirect()->route('admin.dashboard');
    }elseif(Auth::user()->role_id == 2){
        return redirect('/');
    }
})->name('dashboard');

Route::group(['as'=>'admin.','prefix' => 'superadmin', 'middleware'=>['auth','admin']], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //profile
    Route::get('profile', [SettingController::class, 'profile'])->name('profile');
    Route::post('update-profile', [SettingController::class, 'update_profile'])->name('update-profile');
    Route::get('change-password', [SettingController::class, 'change_password'])->name('change-password');
    Route::post('update-password', [SettingController::class, 'update_password'])->name('update-password');
    // category
    Route::resource('category', CategoryController::class);
    Route::post('valid-category-name-slug', [CategoryController::class, 'checkCategory'])->name('valid_category_name_slug');
    // course
    Route::resource('course', CourseController::class);
    Route::post('valid-course-name-slug', [CourseController::class, 'checkCourse'])->name('valid_course_name_slug');
    // lesson
    Route::resource('lesson', LessonController::class);
    Route::get('course-lesson-ajax/{id}', [LessonController::class, 'courseLessonCheck']);
    Route::post('valid-lesson-name-slug', [LessonController::class, 'checkLesson'])->name('valid_lesson_name_slug');
    // users
    Route::resource('users', UserController::class);
});

Route::group(['as'=>'dcadmin.','prefix' => 'dcadmin', 'namespace'=>'App\Http\Controllers\DC','middleware'=>['auth','dc']], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [SettingController::class, 'profile'])->name('profile');
    Route::post('update-profile', [SettingController::class, 'update_profile'])->name('update-profile');

});

