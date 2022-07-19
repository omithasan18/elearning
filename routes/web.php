<?php

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

Route::group(['as'=>'admin.','prefix' => 'superadmin', 'namespace'=>'App\Http\Controllers\Admin','middleware'=>['auth','admin']], function () {
		
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    //profile
    Route::get('profile', 'SettingController@profile')->name('profile');
    Route::post('update-profile', 'SettingController@update_profile')->name('update-profile');
    Route::get('change-password', 'SettingController@change_password')->name('change-password');
    Route::post('update-password', 'SettingController@update_password')->name('update-password');
});

Route::group(['as'=>'dcadmin.','prefix' => 'dcadmin', 'namespace'=>'App\Http\Controllers\DC','middleware'=>['auth','dc']], function () {
		
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    //profile
    Route::get('profile', 'SettingController@profile')->name('profile');
    Route::post('update-profile', 'SettingController@update_profile')->name('update-profile');

});

