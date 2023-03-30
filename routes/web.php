<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HospitalController;
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

// Route::get('/', function () {
//     return view('LandingPage', ['title' => 'Home']);
// });

route::get('/', [HomeController::class, "show"]);
route::get('/redirects', [HomeController::class, "index"]);

route::post('/logout', [HomeController::class, "logout"])->name('logout');



Route::get('/rekomendasirs', [HospitalController::class, 'index']);
Route::get('/detail/{id}', [HospitalController::class, 'show'])->name('hospital.show');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
