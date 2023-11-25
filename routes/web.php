<?php

use App\Http\Controllers\DonController;
use App\Http\Controllers\PersonnageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UsersController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(PersonnageController::class)->group(function () {

    //Route::get('/personnages', 'index');
    Route::get('/personnage/create', 'create');
    Route::get('/personnage/{id}', 'show');
    Route::get('/personnage/{id}/edit', 'edit');
    Route::get('/login', 'login');


    Route::post('/personnage', 'store');
    Route::post('/signin', 'loginTreat');
    Route::patch('/personnage/{id}', 'update');
    Route::delete('/personnage/{id}', 'destroy');

});


Route::controller(UsersController::class)->group(function () {

    //Route::get('/personnages', 'index');
    Route::get('/user/create', 'create');
    Route::get('/user/{id}', 'show');
    Route::get('/user/{id}/edit', 'edit');
    Route::get('/login', 'login');


    Route::post('/user', 'store');
    Route::post('/signin', 'loginTreat');
    Route::patch('/user/{id}', 'update');
    Route::delete('/user/{id}', 'destroy');

});


Route::controller(ProjectController::class)->group(function () {

    Route::get('/', 'index');
    Route::get('/project/listAll', 'listAll');
    Route::get('/project/create', 'create');
    Route::get('/project/{id}', 'show');
    Route::get('/project/{id}/edit', 'edit');


    Route::post('/project', 'store');
    Route::patch('/project/{id}', 'update');
    Route::delete('/project/{id}', 'destroy');

});

Route::controller(DonController::class)->group(function () {

    Route::get('/dons', 'index');
    Route::get('/don/create/{id}', 'showPr');
    Route::get('/don/{id}', 'show');
    Route::get('/don/{id}/edit', 'edit');


    Route::post('/don/{id}', 'store');
    Route::patch('/don/{id}', 'update');
    Route::delete('/don/{id}', 'destroy');

});
