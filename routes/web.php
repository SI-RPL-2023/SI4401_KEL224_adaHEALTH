<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ApotekController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\Auth\RegisterController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('LandingPage', ['title' => 'Home']);
});

// route::get('/', [HomeController::class, "show"]);
route::get('/redirects', [HomeController::class, "index"]);

route::post('/logout', [HomeController::class, "logout"])->name('logout');


//Hospital Route-----------------------------------------------------------------------------
Route::get('/rekomendasirs', [HospitalController::class, 'index']);
Route::get('/hospitals/{id}', [HospitalController::class, 'show'])->name('hospital.show');

Route::get('hospital/{id}/rate', [HospitalController::class, 'createRating'])->name('hospital.createRating');
Route::post('hospital/{id}/rate', [HospitalController::class, 'storeRating'])->name('hospital.storeRating');
//End Route -----------------------------------------------------------------------------------



Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


//Apotek Route
Route::get('/apotek', [ApotekController::class, 'index']);
Route::get('/detail/{id}', [ApotekController::class, 'show'])->name('apotek.show');

Route::get('apotek/{id}/rate', [ApotekController::class, 'createRating'])->name('apotek.createRating');
Route::post('apotek/{id}/rate', [ApotekController::class, 'storeRating'])->name('apotek.storeRating');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
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
// Route::get('login', [LoginController::class, 'index'])->name('login');

//Middleware Login,Logout,
Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
});

//Middleware Group setelah login
Route::group(['middleware' => ['auth']], function () {


    Route::group(['middleware' => ['CekRoleMiddleware:0']], function () {
        Route::resource('/user', UserController::class);

    });

    Route::group(['middleware' => ['CekRoleMiddleware:1']], function () {
        Route::resource('dashboard', AdminController::class);
    });

    Route::group(['middleware' => ['CekRoleMiddleware:2']], function () {
        Route::resource('dokter', DokterController::class);
    });

});

Route::get('/rekomendasirs', function () {
    return view('rekomendasirs');
});