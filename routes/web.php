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


Route::group(['middleware' => ['auth:sanctum']],function (){
    Route::get('/',[\App\Http\Controllers\HomeController::class,'home'])->name('home');
    Route::get('/info',[\App\Http\Controllers\CardsController::class,'info'])->name('info');
    Route::post('/withdraw',[\App\Http\Controllers\CardsController::class,'withdraw'])->name('withdraw');
    Route::post('/addCard',[\App\Http\Controllers\CardsController::class,'addCard'])->name('addCard');
    Route::get('/create',[\App\Http\Controllers\CardsController::class,'create'])->name('create');
    Route::get('/get',function (){
        redirect('info');
    })->name('withdrawget');


    Route::resource('users',\App\Http\Controllers\UsersController::class)->middleware('isAdminMiddleware');

    Route::get('li',[\App\Http\Controllers\LicenceController::class,'index'])->middleware('isAdminMiddleware');;

    Route::post('li', [\App\Http\Controllers\LicenceController::class,'registerLicence'])->name('licenceMake')->middleware('isAdminMiddleware');;


});



