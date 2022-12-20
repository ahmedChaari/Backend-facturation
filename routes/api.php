<?php

use App\Http\Controllers\API\AgenceController;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Auth\NewPasswordController;
use App\Http\Controllers\API\BonController;
use App\Http\Controllers\API\BonTransfertController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ClientTypeController;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\DepositController;
use App\Http\Controllers\API\ModelRoleController;
use App\Http\Controllers\API\ParametreController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\UnityController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





    /*************************************
     *          Public routes            *
     *                                   *
     *************************************/

Route::post('/login',               [AuthController::class,  'login'])->name('login.admin');
Route::post('forgotPassword',       [NewPasswordController::class, 'forgotPassword']);
Route::post('resetPassword',        [NewPasswordController::class, 'resetPassword'])->name('password.reset');


    /*************************************
     *      Protected routes Auth        *
     *                                   *
     *************************************/

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('logout',              [AuthController::class, 'logout']);
    
    //user controller
    Route::post('storeClient',         [UserController::class, 'storeClient']);
    Route::put('updateClient/{user}',  [UserController::class, 'updateClient']);
    Route::get('listUsers',            [UserController::class, 'listUsers']);
    Route::delete('user/delete/{id}',  [UserController::class, 'delete']);
    Route::put('user/restore/{id}',    [UserController::class, 'restore']);
    
    // depot controller
    Route::post('storeDeposit',          [DepositController::class, 'storeDeposit']);
    Route::get('listDeposits',           [DepositController::class, 'listDeposits']);
    Route::put('updateDeposit/{deposit}',[DepositController::class, 'updateDeposit']);
    Route::delete('deleteDeposit/{id}',  [DepositController::class, 'deleteDeposit']);
    Route::put('restoreDeposit/{id}',    [DepositController::class, 'restoreDeposit']);

    //company controller
    Route::post('storeCompany',          [CompanyController::class, 'storeCompany']);
    Route::get('listCompanies',          [CompanyController::class, 'listCompanies']);

    //product
    Route::post('storeProduct',          [ProductController::class, 'storeProduct']);
    Route::get('listProduct',            [ProductController::class, 'listProduct']);
    Route::delete('deleteProduct/{id}',  [ProductController::class, 'deleteProduct']);
    Route::put('restoreProduct/{id}',    [ProductController::class, 'restoreProduct']);
    Route::put('updateProduct/{product}',[ProductController::class, 'updateProduct']);

    //category
    Route::post('storeCategory',           [CategoryController::class, 'storeCategory']);
    Route::put('updateCategory/{category}',[CategoryController::class, 'updateCategory']);
    Route::get('listCategories',           [CategoryController::class, 'listCategories']);
    Route::delete('deleteCategory/{id}',   [CategoryController::class, 'deleteCategory']);
    Route::put('restoreCategory/{id}',     [CategoryController::class, 'restoreCategory']);

    //role
    Route::post('storeRole',           [RoleController::class, 'storeRole']);
    Route::put('updateRole/{role}',    [RoleController::class, 'updateRole']);
    Route::get('listRoles',            [RoleController::class, 'listRoles']);
    Route::delete('deleteRole/{id}',   [RoleController::class, 'deleteRole']);
    Route::put('restoreRole/{id}',     [RoleController::class, 'restoreRole']);

    //parametrage
     Route::get('listCountries',       [ParametreController::class, 'listCountries']);
     Route::get('listCities',          [ParametreController::class, 'listCities']);

    //agences 
    Route::post('storeAgence',         [AgenceController::class, 'storeAgence']);
    Route::get('listAgences',          [AgenceController::class, 'listAgences']);
    Route::delete('deleteAgence/{id}', [AgenceController::class, 'deleteAgence']);
    Route::put('updateAgence/{agence}',[AgenceController::class, 'updateAgence']);

    //client type 
    Route::get('listClientTypes',      [ClientTypeController::class, 'listClientTypes']);
    Route::post('storeClientType',     [ClientTypeController::class, 'storeClientType']);
    Route::put('updateClientType/{clientType}',[ClientTypeController::class, 'updateClientType']);

    //unity 
    Route::get('listUnities',        [UnityController::class, 'listUnities']);
    Route::post('storeUnity',        [UnityController::class, 'storeUnity']);
    Route::put('updateUnity/{unity}',[UnityController::class, 'updateUnity']);

    //mode Role
    Route::get('listModelRole',     [ModelRoleController::class, 'listModelRole']);

    // menu
    Route::get('listMenu',          [ParametreController::class, 'listMenu']);
    Route::get('listSousMenu',      [ParametreController::class, 'listSousMenu']);
    Route::get('listModelRoles',    [ParametreController::class, 'listModelRoles']);

    // bon Entre
    Route::get('listBonEntres',         [BonController::class, 'listBonEntres']);
    Route::post('storeBonEntre',        [BonController::class, 'storeBonEntre']);
    Route::put('updateBonEntre/{bon}',  [BonController::class, 'updateBonEntre']);
    Route::put('validBonEntre/{id}',    [BonController::class, 'validBonEntre']);
    Route::delete('deleteBonEntre/{id}',[BonController::class, 'deleteBonEntre']);
    Route::put('restoreBonEntre/{id}',  [BonController::class, 'restoreBonEntre']);

    // bon sortie
    Route::get('listBonSorties',        [BonController::class, 'listBonSorties']);
    Route::post('storeBonSortie',       [BonController::class, 'storeBonSortie']);

    // bon Transfert
    Route::get('listBonSorties',        [BonTransfertController::class, 'listBonSorties']);
    Route::post('storeBonTransfert',    [BonTransfertController::class, 'storeBonTransfert']);

    //bon Historique
    Route::get('getHistoriqueProductBon',     [BonController::class, 'getHistoriqueProductBon']);
});