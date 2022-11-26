<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\DepositController;
use App\Http\Controllers\API\ProductController;
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

    Route::post('logout',              [AuthController::class, 'logout']);
    //user controller
    Route::post('storeClient',         [UserController::class, 'storeClient']);
    Route::put('updateClient/{user}',  [UserController::class, 'updateClient']);
    Route::get('listUsers/{company}',  [UserController::class, 'listUsers']);
    Route::delete('user/delete/{id}',  [UserController::class, 'delete']);
    Route::put('user/restore/{id}',    [UserController::class, 'restore']);

    // depot controller
    Route::post('storeDeposit',          [DepositController::class, 'storeDeposit']);
    Route::get('listDeposits/{company}', [DepositController::class, 'listDeposits']);
    Route::put('updateDeposit/{deposit}',[DepositController::class, 'updateDeposit']);

    //company controller

    Route::post('storeCompany',          [CompanyController::class, 'storeCompany']);
    Route::get('listCompanies',          [CompanyController::class, 'listCompanies']);


    //product
    Route::post('storeProduct',          [ProductController::class, 'storeProduct']);

});