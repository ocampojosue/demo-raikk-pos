<?php

use App\Http\Controllers\ExportController;
use App\Http\Livewire\Asignar;
use App\Http\Livewire\Cashout;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Categories;
use App\Http\Livewire\Coins;
use App\Http\Livewire\Permisos;
use App\Http\Livewire\Pos;
use App\Http\Livewire\Products;
use App\Http\Livewire\Report;
use App\Http\Livewire\Roles;
use App\Http\Livewire\Users;

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

Auth::routes(['register' => false]);
Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => ['role:Administrador|Cajero']], function () {
        Route::get('categories', Categories::class)->name('categories');
        Route::get('products', Products::class)->name('products');
        Route::get('coins', Coins::class)->name('coins');
        Route::get('pos', Pos::class)->name('pos');

        Route::get('roles', Roles::class)->name('roles');
        Route::get('asignar', Asignar::class)->name('asignar');
        Route::get('permissions', Permisos::class)->name('permissions');

        Route::get('users', Users::class)->name('users');
        Route::get('cashout', Cashout::class)->name('cashout');
        Route::get('reports', Report::class)->name('reports');
    });
    Route::group(['middleware' => ['role:Administrador|Cajero|Supervisor']], function () {
        Route::get('categories', Categories::class)->name('categories');
        Route::get('products', Products::class)->name('products');
        Route::get('coins', Coins::class)->name('coins');
        Route::get('users', Users::class)->name('users');
    });

    // Route::get('/', function () {
    //     return view('home');
    // });


    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Reportes PDF
    Route::get('report/pdf/{user}/{type}/{f1}/{f2}', [ExportController::class, 'reportePDF']);
    Route::get('report/pdf/{user}/{type}', [ExportController::class, 'reportePDF']);

    //Reportes Excel
    Route::get('report/excel/{user}/{type}/{f1}/{f2}', [ExportController::class, 'reporteExcel']);
    Route::get('report/excel/{user}/{type}', [ExportController::class, 'reporteExcel']);
});
