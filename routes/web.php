<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
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

Route::get('/home', function () {
    return view('LandingPage');
});

Route::get('/hargadanjenisobat', function () {
    return view('hargadanjenisobat');
});

Route::get('/obats', [ObatController::class, 'index']);
Route::get('/obats', [ObatController::class, 'showKategori']);
Route::get('/obat/{kategori}', [ObatController::class, 'kategori'])->name('obat.kategori');
Route::get('/obat/{obat}/detail', [ObatController::class, 'detail'])->name('obat.detail');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
