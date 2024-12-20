<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatmobController;
use App\Http\Controllers\DatpenController;
use App\Http\Controllers\DattranController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\StokMobilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Models\StokMobil;

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
    Route::get('/dashboard', [IndexController::class, 'index'])->name('admin.index');
    });



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('datmobs')->group(function(){
        Route::get('/view', [DatmobController::class, 'index'])->name('datmob.view');
        Route::get('/add', [DatmobController::class, 'create'])->name('datmob.add');
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
        Route::post('/store', [DatpenController::class, 'store'])->name('datpen.store');
        Route::get('/edit/{id}', [DatpenController::class, 'edit'])->name('datpen.edit');
        Route::post('/update/{id}', [DatpenController::class, 'update'])->name('datpen.update');
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('dattrans')->group(function(){
        Route::get('/view', [DattranController::class, 'index'])->name('dattran.view');
        Route::get('/add', [DattranController::class, 'create'])->name('dattran.add');
        Route::post('/store', [DattranController::class, 'store'])->name('dattran.store');
        Route::get('/edit/{id}', [DattranController::class, 'edit'])->name('dattran.edit');
        Route::get('/update/{id}', [DattranController::class, 'update'])->name('dattran.update');
        Route::get('/delete/{id}',[DattranController::class, 'delete'])->name('dattran.delete');
        Route::get('/get', [AnggotaController::class, 'getData']);
        Route::get('/edit-bukti/{id}', [DattranController::class, 'editbuktidattran'])->name('buktidattran.edit');
        Route::post('/update-bukti/{id}', [DattranController::class, 'updatebuktidattran'])->name('buktidattran.update');
        Route::get('/edit-nilai/{id}', [AnggotaController::class, 'editnilaidattran'])->name('nilaidattran.edit');
        Route::post('/update-nilai/{id}', [AnggotaController::class, 'updatenilaidattran'])->name('nilaidattran.update');
        Route::get('/tambah-nilai/{id}', [AnggotaController::class, 'tambahnilaidattran'])->name('nilaidattran.tambah');
        Route::get('/delete/{id}', [DattranController::class, 'destroy'])->name('dattran.delete');
        Route::get('dattran/export', [DattranController::class, 'export'])->name('dattran.export');
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('stok_mobils')->group(function(){
        Route::get('/view', [StokMobilController::class, 'index'])->name('stokmobil.view');
        Route::get('/add', [StokMobilController::class, 'create'])->name('stokmobil.add');
        Route::post('/store', [StokMobilController::class, 'store'])->name('stokmobil.store');
        Route::get('/edit/{id}', [StokMobilController::class, 'edit'])->name('stokmobil.edit');
        Route::get('/update/{id}', [StokMobilController::class, 'update'])->name('stokmobil.update');
        // Route::get('/delete/{id}',[StokMobilController::class, 'delete'])->name('stokmobil.delete');
        Route::get('/get', [AnggotaController::class, 'getData']);
        Route::get('/edit-bukti/{id}', [StokMobilController::class, 'editbuktistokmobil'])->name('buktistokmobil.edit');
        Route::post('/update-bukti/{id}', [StokMobilController::class, 'updatebuktistokmobil'])->name('buktistokmobil.update');
        // Route::get('/edit-nilai/{id}', [AnggotaController::class, 'editnilaistokmobil'])->name('nilaistokmobil.edit');
        // Route::post('/update-nilai/{id}', [AnggotaController::class, 'updatenilaistokmobil'])->name('nilaistokmobil.update');
        // Route::get('/tambah-nilai/{id}', [AnggotaController::class, 'tambahnilaistokmobil'])->name('nilaistokmobil.tambah');
        Route::get('/delete/{id}', [StokMobilController::class, 'destroy'])->name('stokmobil.delete');

    });

   // Route::get('/login',[LoginController::class,'index'])->name('login');
    //Route::post('/login-proses',[LoginController::class,'login_proses'])->name('login-proses');
});