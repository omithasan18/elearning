<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    if (Auth::user()->role_id == 1) {
        return redirect()->route('admin.dashboard');
    }else {
        return redirect()->route('login');
    }
})->name('dashboard');

Route::group(['as'=>'admin.','prefix' => 'superadmin', 'middleware'=>['auth','admin']], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //profile
    Route::get('profile', [SettingController::class, 'profile'])->name('profile');
    Route::post('update-profile', [SettingController::class, 'update_profile'])->name('update-profile');
    Route::get('change-password', [SettingController::class, 'change_password'])->name('change-password');
    Route::post('update-password', [SettingController::class, 'update_password'])->name('update-password');
    Route::resource('category', CategoryController::class);
    Route::post('valid-category-name-slug', [CategoryController::class, 'checkCategory'])->name('valid_category_name_slug');

});

Route::group(['as'=>'dcadmin.','prefix' => 'dcadmin', 'namespace'=>'App\Http\Controllers\DC','middleware'=>['auth','dc']], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [SettingController::class, 'profile'])->name('profile');
    Route::post('update-profile', [SettingController::class, 'update_profile'])->name('update-profile');

});

