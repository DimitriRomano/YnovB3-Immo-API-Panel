<?php

    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\PropertyController;
    use App\Http\Controllers\ReservationController;
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
//    Route::get('/admin/properties/{id}', [DashboardController::class, 'getProperty'])->name('admin.properties.show');

    Route::post('/admin/properties', [PropertyController::class, 'store'])->name('admin.properties.create');
    Route::put('/admin/properties/{id}', [PropertyController::class, 'update'])->name('admin.properties.update');
    Route::delete('/admin/properties/{id}', [DashboardController::class, 'delete_offer'])->name('admin.properties.delete');

    // Voir tous les utilisateurs
    Route::get('/admin/users', [AuthController::class, 'findAll'])->name('admin.users');

    // Réservations
    Route::get('/admin/properties/reservations', [ReservationController::class, 'allProperties'])->name('admin.properties.reservations');

    Route::get('/admin/{idProperty}/reservations', [ReservationController::class, 'allReservationForProperty'])->name('admin.property.reservations');

    Route::get('/admin/user/reservations', [ReservationController::class, 'allReservationForUser'])->name('admin.reservations');

    // Accepter une réservation
    Route::put('/properties/{id}/accept', [ReservationController::class, 'accept'])->name('admin.reservations.accept');

    // Refuser une réservation
    Route::put('/properties/{id}/decline', [ReservationController::class, 'decline'])->name('admin.reservations.decline');

});

require __DIR__.'/auth.php';
