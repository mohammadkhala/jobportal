<?php
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isAdminMiddleware;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\TestController;
use App\Models\PersonalTest;
use App\Http\Controllers\PersonalTestController;

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

////// customers routes

});
Route::get('/customer', [CustomerController::class, 'index'])->name('admin.customer');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('admin.customer.create');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('admin.customer.store');
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('admin.customer.edit');
Route::put('/customer/update/{id}', [CustomerController::class, 'update'])->name('admin.customer.update');
Route::get('/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('admin.customer.delete');
//////
//// appointment routes
Route::get('/appointment', [AppointmentController::class, 'index'])->name('admin.appointment');
Route::get('/appointment/create', [AppointmentController::class, 'create'])->name('admin.appointment.create');
Route::post('/appointment/store', [AppointmentController::class, 'store'])->name('admin.appointment.store');
Route::get('/appointment/edit/{id}', [AppointmentController::class, 'edit'])->name('admin.appointment.edit');
Route::put('/appointment/update/{id}', [AppointmentController::class, 'update'])->name('admin.appointment.update');
Route::get('/appointment/delete/{id}', [AppointmentController::class, 'destroy'])->name('admin.appointment.delete');
//// test routes
Route::get('/test', [TestController::class, 'index'])->name('admin.test');
Route::get('/test/create', [TestController::class, 'create'])->name('admin.test.create');
Route::post('/test/store', [TestController::class, 'store'])->name('admin.test.store');
Route::get('/test/edit/{id}', [TestController::class, 'edit'])->name('admin.test.edit');
Route::put('/test/update/{id}', [TestController::class, 'update'])->name('admin.test.update');
Route::get('/test/delete/{id}', [TestController::class, 'destroy'])->name('admin.test.delete');
////personal test routes
Route::get('/ptest', [PersonalTestController::class, 'index'])->name('admin.ptest');
Route::get('/ptest/create', [PersonalTestController::class, 'create'])->name('admin.ptest.create');
Route::post('/ptest/store', [PersonalTestController::class, 'store'])->name('admin.ptest.store');
Route::get('/ptest/edit/{id}', [PersonalTestController::class, 'edit'])->name('admin.ptest.edit');
Route::put('/ptest/update/{id}', [PersonalTestController::class, 'update'])->name('admin.ptest.update');
Route::get('/ptest/delete/{id}', [PersonalTestController::class, 'destroy'])->name('admin.ptest.delete');
