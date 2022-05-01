<?php

    use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', [DashboardController::class,'getDashboard'])->name('home');

// Voir toutes les annonces
Route::get('/admin/properties', [PropertyController::class, 'findAll']);

// Voir une annonce
Route::get('/admin/properties/{id}', [PropertyController::class, 'findOne']);

// Créer une annonce
Route::post('/admin/properties', [PropertyController::class, 'admin_store']);

// Editer une annonce
Route::put('/admin/properties/{id}', [PropertyController::class, 'admin_update'])->name('admin.properties.update');

// Supprimer une annonce
Route::delete('/admin/properties/{id}', [PropertyController::class, 'admin_delete'])->name('admin.properties.delete');

require __DIR__.'/auth.php';
