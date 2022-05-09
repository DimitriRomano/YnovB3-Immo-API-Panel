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
})->name('welcome');


Route::middleware('adminWeb')->group(function(){
    Route::get('/home/admin', [DashboardController::class,'getDashboard'])->name('home');

    Route::get('/admin/properties', [DashboardController::class, 'getProperties'])->name('admin.properties');
//    Route::get('/admin/properties/{id}', [DashboardController::class, 'getProperty'])->name('admin.properties.show');

    Route::get('/admin/properties/create', [DashboardController::class, 'getFormCreate'])->name('admin.properties.form.create');
    Route::get('/admin/properties/edit/{id}', [DashboardController::class, 'getFormEdit'])->name('admin.properties.form.edit');
    Route::post('/admin/properties', [PropertyController::class, 'create'])->name('admin.properties.create');
    Route::put('/admin/properties/{id}', [PropertyController::class, 'update'])->name('admin.properties.update');
    Route::delete('/admin/properties/{id}', [PropertyController::class, 'admin_delete'])->name('admin.properties.delete');

    // USERS
    Route::get('/admin/users', [AuthController::class, 'findAll'])->name('admin.users');
    Route::get('/admin/users/{id}', [DashboardController::class, 'admin_user_edit'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [AuthController::class, 'admin_update'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [AuthController::class, 'admin_delete'])->name('admin.users.delete');


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
