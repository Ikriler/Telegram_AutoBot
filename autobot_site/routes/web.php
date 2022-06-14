<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TelegramUserController;
use App\Models\TelegramUser;
use App\Http\Controllers\CheckCarsController;
use App\Http\Controllers\UserController;
use App\Models\CheckCars;
use App\Http\Controllers\RegCarsController;
use App\Models\RegCars;
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
    return view('auth');
})->name('auth');

Route::get('welcome', function () {
    return view('welcome');
})->name('welcome')->middleware('role');

Route::get('user_editing', function () {
    return view('user_editing');
})->name('user_editing')->middleware('role');

Route::post('users/update', [UserController::class, 'update'])->middleware('role');
Route::post('users/delete', [UserController::class, 'destroy'])->middleware('role');
Route::post('users/create', [UserController::class, 'store'])->middleware('role');
Route::get('users/index', [UserController::class, 'index'])->middleware('role');
Route::get('users/testData', [UserController::class, 'addFiveRandomUsers'])->middleware('role');
Route::get('users/getCount', [UserController::class, 'getUsersCount'])->middleware('role');
Route::get('reg_cars/getCount', [RegCarsController::class, 'getCarsCount'])->middleware('role');

Route::get('usersList', function() {
    return view("usersList");
})->name("usersList")->middleware('role');

Route::get('UserReportFilter', function() {
    return view("UserReportFilter")->middleware('role');
});

Route::post('login', [AuthController::class, 'login'])->name("login");

Route::get('admin', function(){
    return view('admin');
})->name("index")->middleware('role:admin');

Route::get('security', function(){
    return view('security');
})->name("security")->middleware('role:guard');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('UserManage', function () {
    return view('UserManage');
})->name('userManage')->middleware('role');

Route::get('otchet', function () {
    return view('otchet');
})->name('otchet')->middleware('role');



Route::get('otchetAuto', function () {
    return view('otchetAuto');
})->name('otchetAuto')->middleware('role');



Route::get('RegCarsFilter', function () {
    return view('RegCarsFilter');
})->name('RegCarsFilter')->middleware('role');



Route::get('NewRegCar', function () {
    return view('NewRegCar');
})->name('newregcar')->middleware('role');


Route::apiResource('reg_cars', RegCarsController::class)->middleware('role');
Route::post('reg_cars/update', [RegCarsController::class, 'update'])->middleware('role');
Route::post('reg_cars/delete', [RegCarsController::class, 'destroy'])->middleware('role');
Route::post('reg_cars/create', [RegCarsController::class, 'store'])->middleware('role');


Route::get('/RegCars', function () {
    return view('RegCars');
})->name('RegCars')->middleware('role');
