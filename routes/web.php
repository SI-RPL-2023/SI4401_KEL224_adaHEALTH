<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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


Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);




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
