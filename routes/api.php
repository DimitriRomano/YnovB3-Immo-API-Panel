<?php

use App\Http\Controllers\FavoriteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PropertyController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');


// ADMIN
Route::middleware(['auth:sanctum','role:admin'])->group(function () {
    // Voir toutes les annonces
    Route::get('/admin/properties', [PropertyController::class, 'findAll']);

    // Voir une annonce
    Route::get('/admin/properties/{id}', [PropertyController::class, 'findOne']);

    // Créer une annonce
    Route::post('/admin/properties', [PropertyController::class, 'admin_store']);

    // Editer une annonce
    Route::put('/admin/properties/{id}', [PropertyController::class, 'admin_update']);

    // Supprimer une annonce
    Route::delete('/admin/properties/{id}', [PropertyController::class, 'admin_delete']);

    // Accepter une offre
    Route::post('/properties/{id}/accept', [PropertyController::class, 'acceptOffer']);

    // Refuser une offre
    Route::post('/properties/{id}/refuse', [PropertyController::class, 'refuseOffer']);
});

// USER
Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/favorites/{id}', [FavoriteController::class, 'add_favorites']);
    Route::delete('/favorites/{id}', [FavoriteController::class, 'remove_favorites']);
    Route::get('/favorites', [FavoriteController::class, 'show_favorites']);
});


// GLOBAL
Route::get('/properties', [PropertyController::class, 'findAll']);
Route::get('/properties/{id}', [PropertyController::class, 'findOne']);
