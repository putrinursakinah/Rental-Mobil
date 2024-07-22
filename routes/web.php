<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatmobController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DatpenController;
use App\Http\Controllers\DattranController;
use App\Http\Controllers\UserController;
use App\Models\User;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    });
    Route::get('/dashboard2', function () {
        return view('admin.index2');
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('datmobs')->group(function(){
        Route::get('/view', [DatmobController::class, 'index'])->name('datmob.view');
        Route::get('/add', [DatmobController::class, 'create'])->name('datmob.add');
        Route::get('/add2', [DatmobController::class, 'create'])->name('datmob2.add');
        Route::post('/store', [DatmobController::class, 'store'])->name('datmob.store');
        Route::get('/edit/{id}', [DatmobController::class, 'edit'])->name('datmob.edit');
        Route::get('/update/{id}', [DatmobController::class, 'update'])->name('datmob.update');
        Route::get('/delete/{id}',[DatmobController::class, 'delete'])->name('datmob.delete');
        Route::get('/get', [AnggotaController::class, 'getData']);
        Route::get('/edit-bukti/{id}', [DatmobController::class, 'editbukti'])->name('bukti.edit');
        Route::post('/update-bukti/{id}', [DatmobController::class, 'updatebukti'])->name('bukti.update');
        Route::get('/edit-nilai/{id}', [AnggotaController::class, 'editnilai'])->name('nilai.edit');
        Route::post('/update-nilai/{id}', [AnggotaController::class, 'updatenilai'])->name('nilai.update');
        Route::get('/tambah-nilai/{id}', [AnggotaController::class, 'tambahnilai'])->name('nilai.tambah');
        Route::get('/delete/{id}', [DatmobController::class, 'destroy'])->name('datmob.delete');
    });
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('datpens')->group(function(){
        Route::get('/view', [DatpenController::class, 'index'])->name('datpen.view');
        Route::get('/add', [DatpenController::class, 'create'])->name('datpen.add');
        Route::get('/add2', [DatpenController::class, 'create'])->name('datpen2.add');
        Route::post('/store', [DatpenController::class, 'store'])->name('datpen.store');
        Route::get('/edit/{id}', [DatpenController::class, 'edit'])->name('datpen.edit');
        Route::get('/update/{id}', [DatpenController::class, 'update'])->name('datpen.update');
        Route::get('/delete/{id}',[DatpenController::class, 'delete'])->name('datpen.delete');
        Route::get('/get', [AnggotaController::class, 'getData']);
        Route::get('/edit-bukti/{id}', [DatpenController::class, 'editbuktidatpen'])->name('buktidatpen.edit');
        Route::post('/update-bukti/{id}', [DatpenController::class, 'updatebuktidatpen'])->name('buktidatpen.update');
        Route::get('/edit-nilai/{id}', [AnggotaController::class, 'editnilaidatpen'])->name('nilaidatpen.edit');
        Route::post('/update-nilai/{id}', [AnggotaController::class, 'updatenilaidatpen'])->name('nilaidatpen.update');
        Route::get('/tambah-nilai/{id}', [AnggotaController::class, 'tambahnilaidatpen'])->name('nilaidatpen.tambah');
        Route::get('/delete/{id}', [DatpenController::class, 'destroy'])->name('datpen.delete');
        Route::get('/dashboard2', [DatpenController::class, 'indexDashboard'])->name('dashboard2.view');
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('dattrans')->group(function(){
        Route::get('/view', [DattranController::class, 'index'])->name('dattran.view');
        Route::get('/add', [DattranController::class, 'create'])->name('dattran.add');
        // Route::get('/add', [DatmobController::class, 'create'])->name('datmob2.add');
        Route::post('/store', [DattranController::class, 'store'])->name('dattran.store');
        Route::get('/edit/{id}', [DattranController::class, 'edit'])->name('dattran.edit');
        Route::get('/update/{id}', [DattranController::class, 'update'])->name('dattran.update');
        Route::get('/delete/{id}',[DattranController::class, 'delete'])->name('dattran.delete');
        Route::get('/get', [AnggotaController::class, 'getData']);
        Route::get('/edit-bukti/{id}', [DattranController::class, 'editbukti'])->name('bukti.edit');
        Route::post('/update-bukti/{id}', [DattranController::class, 'updatebukti'])->name('bukti.update');
        Route::get('/edit-nilai/{id}', [AnggotaController::class, 'editnilai'])->name('nilai.edit');
        Route::post('/update-nilai/{id}', [AnggotaController::class, 'updatenilai'])->name('nilai.update');
        Route::get('/tambah-nilai/{id}', [AnggotaController::class, 'tambahnilai'])->name('nilai.tambah');
        Route::get('/delete/{id}', [DattranController::class, 'destroy'])->name('dattran.delete');
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('users')->group(function(){
        Route::get('/view', [UserController::class, 'index'])->name('user.view');
        Route::get('/add', [UserController::class, 'create'])->name('user.add');
        Route::get('/add2', [UserController::class, 'create'])->name('user2.add');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::get('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/delete/{id}',[UserController::class, 'delete'])->name('user.delete');
        Route::get('/get', [AnggotaController::class, 'getData']);
        Route::get('/edit-bukti/{id}', [UserController::class, 'editbuktiuser'])->name('buktiuser.edit');
        Route::post('/update-bukti/{id}', [UserController::class, 'updatebuktiuser'])->name('buktiuser.update');
        Route::get('/edit-nilai/{id}', [AnggotaController::class, 'editnilaiuser'])->name('nilaiuser.edit');
        Route::post('/update-nilai/{id}', [AnggotaController::class, 'updatenilaiuser'])->name('nilaiuser.update');
        Route::get('/tambah-nilai/{id}', [AnggotaController::class, 'tambahnilaiuser'])->name('nilaiuser.tambah');
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
        //Route::get('/dashboard2', [DatpenController::class, 'indexDashboard'])->name('dashboard2.view');
    });
});