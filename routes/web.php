<?php
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isAdminMiddleware;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppointmentController;

Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
Route::group(['middleware' => ['is_admin']],function (){
    Route::get('/admin', function () {


        return view('admin');

    })->name('admin');


});
////// customers routes
Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
Route::put('/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::get('/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');
//////
//// appointment routes
Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment');
Route::get('/appointment/create', [AppointmentController::class, 'create'])->name('appointment.create');
Route::post('/appointment/store', [AppointmentController::class, 'store'])->name('appointment.store');
Route::get('/appointment/edit/{id}', [AppointmentController::class, 'edit'])->name('appointment.edit');
Route::put('/appointment/update/{id}', [AppointmentController::class, 'update'])->name('appointment.update');
Route::get('/appointment/delete/{id}', [AppointmentController::class, 'destroy'])->name('appointment.delete');
