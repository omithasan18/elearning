<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PageCategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\BadgeController;
use App\Http\Controllers\Admin\GlossaryController;

use App\Http\Controllers\HomeController;

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

Route::get('/', 'App\Http\Controllers\WelcomeController@index')->name('frontend.index');

Route::get('/register', 'App\Http\Controllers\WelcomeController@register')->name('register');
Route::post('/register', 'App\Http\Controllers\WelcomeController@save_register')->name('student-register');
Route::get('/home', 'App\Http\Controllers\HomeController@home')->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    if (Auth::user()->role_id == 1) {
        return redirect()->route('admin.dashboard');
    }elseif(Auth::user()->role_id == 2){
        return redirect('/');
    }
})->name('dashboard');

Route::get('course', [HomeController::class, 'course'])->name('course');
Route::get('course-details', [HomeController::class, 'courseDetails'])->name('course.details');
Route::get('lesson-details', [HomeController::class, 'lessonDetails'])->name('lesson.details');

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
    // page
    Route::resource('page-category', PageCategoryController::class);
    Route::resource('pages', PageController::class);
    // site setting 
    Route::resource('site-setting', SiteSettingController::class);
    Route::post('get-add-row', [SiteSettingController::class, 'addRemoveRow'])->name('row.addremove');
    // question
    Route::resource('question', QuestionController::class);
    // badges
    Route::resource('badges', BadgeController::class);
    Route::resource('glossary', GlossaryController::class);
    
});

Route::group(['as'=>'dcadmin.','prefix' => 'dcadmin', 'namespace'=>'App\Http\Controllers\DC','middleware'=>['auth','dc']], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [SettingController::class, 'profile'])->name('profile');
    Route::post('update-profile', [SettingController::class, 'update_profile'])->name('update-profile');

});

