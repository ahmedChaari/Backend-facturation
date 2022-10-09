<?php

use App\Http\Controllers\API\Auth\AuthController;
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
});