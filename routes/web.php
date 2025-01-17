<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\DeliveryController;
use App\Models\Delivery;

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

// Route::get('/', function () {
    
//     return view('dashboard');
// });


Route::get('/', [PackageController::class, 'index'])->name('home');


Route::post('/package-store', [PackageController::class, 'store'])->name('package.store');


Route::get('/list-of-packages', [PackageController::class, 'index'])->name('list-of-packages');


Route::get('/get-package/{id}', [PackageController::class, 'getPackage'])->name('get.package');


Route::post('/update-package/{id}', [PackageController::class, 'update'])->name('update.package');


Route::get('/delete-package/{id}', [PackageController::class, 'destroy'])->name('delete-package');






Route::get('/add-delivery-info/{id}', [DeliveryController::class, 'addDeliveryInfo'])->name('add.delivery');

Route::post('/update-delivery-info/{id}', [DeliveryController::class, 'updateDeliveryInfo'])->name('update.delivery');


Route::get('/list-of-delivery-info', [DeliveryController::class, 'listOfDeliveryInfo'])->name('get.delivery');


Route::get('/delete-delivery-info/{id}', [DeliveryController::class, 'deleteDeliveryInfo'])->name('delete.delivery');


Route::get('/packages-datatable', [PackageController::class, 'packagesDatatable'])->name('packages.datatable');


