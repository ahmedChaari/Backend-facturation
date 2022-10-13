<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




/*************************************
 *          Public routes            *
 *                                   *
 *************************************/


Route::post('/login',               [AuthController::class,  'login'])->name('login.admin');


    /*************************************
     *      Protected routes Auth        *
     *                                   *
     *************************************/

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('logout',             [AuthController::class, 'logout']);
    //user controller
    Route::post('storeClient',         [UserController::class, 'storeClient']);
    Route::put('updateClient/{user}', [UserController::class, 'updateClient']);
    Route::get('listUsers/{company}',  [UserController::class, 'listUsers']);
    
});