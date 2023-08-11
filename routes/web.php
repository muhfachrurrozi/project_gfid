<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



/*------------------------------------------
--------------------------------------------
All Normal Fabrikasi Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:fab', 'user-access:manager'])->group(function () {

    Route::get('/fm/index', [HomeController::class, 'fmHome'])->name('fm.index');
});
Route::middleware(['auth', 'user-access:fab', 'user-access:supervisor'])->group(function () {

    Route::get('/fs/index', [HomeController::class, 'fsHome'])->name('fs.index');
});
Route::middleware(['auth', 'user-access:fab', 'user-access:foreman'])->group(function () {

    Route::get('/ff/index', [HomeController::class, 'ffHome'])->name('ff.index');
});
Route::middleware(['auth', 'user-access:fab', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
/*------------------------------------------
--------------------------------------------
All Normal Extrusi Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:ext', 'user-access:manager'])->group(function () {

    Route::get('/em/index', [HomeController::class, 'emHome'])->name('em.index');
});
Route::middleware(['auth', 'user-access:ext', 'user-access:supervisor'])->group(function () {

    Route::get('/es/index', [HomeController::class, 'esHome'])->name('es.index');
});
Route::middleware(['auth', 'user-access:ext', 'user-access:foreman'])->group(function () {

    Route::get('/ef/index', [HomeController::class, 'efHome'])->name('ef.index');
});
Route::middleware(['auth', 'user-access:ext', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
/*------------------------------------------
--------------------------------------------
All Normal Extrusi Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:pm', 'user-access:manager'])->group(function () {

    Route::get('/pm/index', [HomeController::class, 'pmHome'])->name('pm.index');
});
Route::middleware(['auth', 'user-access:pm', 'user-access:supervisor'])->group(function () {

    Route::get('/ps/index', [HomeController::class, 'psHome'])->name('ps.index');
});
Route::middleware(['auth', 'user-access:pm', 'user-access:foreman'])->group(function () {

    Route::get('/pf/index', [HomeController::class, 'pfHome'])->name('pf.index');
});
Route::middleware(['auth', 'user-access:pm', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin', 'user-access:admin'])->group(function () {

    Route::get('/admin/index', [HomeController::class, 'adminHome'])->name('admin.index');
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('mesins', MesinController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('scraps', ScrapController::class);
    Route::resource('grns', GrnController::class);
    Route::get('grns/printgrn', [GrnController::class, 'generatePDF'])->name('grns.printgrn');
    Route::resource('passqcs', QcpassController::class);
    Route::resource('gudangs', WrhController::class);
});

// /*------------------------------------------
// --------------------------------------------
// All Admin Routes List
// --------------------------------------------
// --------------------------------------------*/
// Route::middleware(['auth', 'user-access:manager'])->group(function () {

    //     Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');