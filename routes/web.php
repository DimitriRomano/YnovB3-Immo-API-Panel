<?php

    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\PropertyController;
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

Route::get('/home/admin', [DashboardController::class,'getDashboard'])->name('home');

Route::middleware('adminWeb')->group(function(){

    Route::get('/admin/properties', [DashboardController::class, 'getProperties'])->name('admin.properties');
    Route::get('/admin/properties/{id}', [DashboardController::class, 'getProperty'])->name('admin.properties.show');

    Route::post('/admin/properties', [PropertyController::class, 'admin_store'])->name('admin.properties.create');

    Route::put('/admin/properties/{id}', [PropertyController::class, 'admin_update'])->name('admin.properties.update');

    Route::delete('/admin/properties/{id}', [DashboardController::class, 'delete_offer'])->name('admin.properties.delete');
});

require __DIR__.'/auth.php';
