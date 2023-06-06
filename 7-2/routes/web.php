<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', 'IndexController@top');
Route::get('/index', 'IndexController@top');
Route::get('localhost', 'IndexController@top');

Route::get('top', 'IndexController@top')
    ->name('main.top');
Route::post('top', 'IndexController@top')
    ->name('main.top');

Route::get('admin_top', 'IndexController@admin_top')
    ->name('main.admin_top');
Route::post('admin_top', 'IndexController@admin_top')
    ->name('main.admin_top');

Route::get('signup', 'IndexController@signup')
    ->name('main.signup');
Route::post('signup', 'IndexController@signup')
    ->name('main.signup');

Route::get('signup_confirm', 'IndexController@signup_confirm')
    ->name('main.signup_confirm');
Route::post('signup_confirm', 'IndexController@signup_confirm')
    ->name('main.signup_confirm');

Route::get('signup_complete', 'IndexController@signup_complete')
    ->name('main.signup_complete');
Route::post('signup_complete', 'IndexController@signup_complete')
    ->name('main.signup_complete');

Route::get('login1', 'IndexController@login1')
    ->name('main.login1');
Route::post('login1', 'IndexController@login1')
    ->name('main.login1');

Route::get('admin_login', 'IndexController@admin_login')
    ->name('main.admin_login');
Route::post('admin_login', 'IndexController@admin_login')
    ->name('main.admin_login');

Route::get('login2', 'IndexController@login2')
    ->name('main.login2');
Route::post('login2', 'IndexController@login2')
    ->name('main.login2');

Route::get('admin_login2', 'IndexController@admin_login2')
    ->name('main.admin_login2');
Route::post('admin_login2', 'IndexController@admin_login2')
    ->name('main.admin_login2');


Route::get('main', 'IndexController@main')
    ->name('main.main');
Route::post('main', 'IndexController@main')
    ->name('main.main');
Route::middleware('auth')->get('api/profile', 'IndexController@main');
Route::middleware('auth')->post('api/profile', 'IndexController@main');

Route::get('admin_main', 'IndexController@admin_main')
    ->name('main.admin_main');
Route::post('admin_main', 'IndexController@admin_main')
    ->name('main.admin_main');

Route::get('detail', 'IndexController@detail')
    ->name('main.detail');
Route::post('detail', 'IndexController@detail')
    ->name('main.detail');

Route::get('detail/{Id}', [IndexController::class, 'detail']);
Route::post('detail/{Id}', [IndexController::class, 'detail']);

Route::get('contracts', 'IndexController@contracts')
    ->name('main.detail');
Route::post('contracts', 'IndexController@contracts')
    ->name('main.contracts');

Route::get('con_confirm', 'IndexController@con_confirm')
    ->name('main.con_confirm');
Route::post('con_confirm', 'IndexController@con_confirm')
    ->name('main.con_confirm');

Route::get('con_complete', 'IndexController@con_complete')
    ->name('main.con_complete');
Route::post('con_complete', 'IndexController@con_complete')
    ->name('main.con_complete');

Route::get('update', 'IndexController@update')
    ->name('main.update');
Route::post('update', 'IndexController@update')
    ->name('main.update');

Route::get('update_com', 'IndexController@update_com')
    ->name('main.update_com');
Route::post('update_com', 'IndexController@update_com')
    ->name('main.update_com');

Route::get('delete', 'IndexController@delete')
    ->name('main.delete');
Route::post('delete', 'IndexController@delete')
    ->name('main.delete');

Route::get('admin_delete/{Id}', 'IndexController@admin_delete')
    ->name('main.admin_delete');
Route::post('admin_delete/{Id}', 'IndexController@admin_delete')
    ->name('main.admin_delete');
//Route::delete('main/admin_delete/{Id}', 'IndexController@admin_delete')
//  ->name('main.admin_delete');
//Route::get('admin_delete/{Id}', [IndexController::class, 'delete']);
//Route::post('admin_delete/{Id}', [IndexController::class, 'delete']);


Route::get('admin_display/{Id}', 'IndexController@admin_display')
    ->name('main.admin_display');
Route::post('admin_display/{Id}', 'IndexController@admin_display')
    ->name('main.admin_display');

Route::get('password_reset', 'IndexController@password_reset')
    ->name('main.password_reset');
Route::post('password_reset', 'IndexController@password_reset')
    ->name('main.password_reset');

Route::get('reset_com', 'IndexController@reset_com')
    ->name('main.reset_com');
Route::post('reset_com', 'IndexController@reset_com')
    ->name('main.reset_com');
