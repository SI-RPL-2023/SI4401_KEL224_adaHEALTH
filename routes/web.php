<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bmiController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ApotekController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\HistoryTransaction;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\FeedbackUserController;
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


Route::get('/profile/{id}', [UserController::class, 'show'])->name('profile.show');
Route::put('/profile/{id}', [UserController::class, 'edit'])->name('updateProfile.put');

// Route::get('/history', function () {
//     return view('historytransaksi');
// });
Route::get('/history', [HistoryTransaction::class, 'index']);

Route::get('/help', function () {
    return view('help', ['title'=>'Help']);
});


Route::get('/', function () {
    return view('LandingPage', ['title' => 'Home']);
});
Route::get('/services', [ServicesController::class, 'index'])->name('index.services');
// route::get('/', [HomeController::class, "show"]);
// route::get('/redirects', [HomeController::class, "index"]);

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
Route::get('/apotek/{id}', [ApotekController::class, 'show'])->name('apotek.detail');

Route::get('/help', [HelpController::class, 'index'])->name('help.index');
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

Route::get('/obats/detail/{id}', [ObatController::class, 'show']);
Route::post('/obats/detail/{id}', [ObatController::class, 'store_pesan'])->name('obat.store_pesan');
Route::post('/obat/detail/{id}', [ObatController::class, 'updateStatus'])->name('transaction.update');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
//Middleware Login,Logout,
Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
});

//Middleware Group setelah login
Route::group(['middleware' => ['auth']], function () {
    Route::get('dokter', [AdminController::class, 'dokter_view']);

    Route::group(['middleware' => ['CekRoleMiddleware:0']], function () {
        Route::resource('/user', UserController::class);
        //Route untuk Fitur Feedback CRUD
        Route::get('/feedback', [FeedbackUserController::class, 'show'])->name('feedback.show');
        Route::post('/feedback', [FeedbackUserController::class, 'store'])->name('feedback.store');
        Route::put('/feedback/{id}', [FeedbackUserController::class, 'update'])->name('feedback.update');
        // Route::delete('/feedback/{id}', [FeedbackUserController::class, 'destroy'])->name('feedback.destroy');
        //End Route untuk Fitur Feedback CRUD
    });

    Route::group(['middleware' => ['CekRoleMiddleware:1']], function () {
        Route::resource('dashboard', AdminController::class);
        Route::get('dokter/add', [AdminController::class, 'form_tambah']);
        Route::post('dokter/save', [AdminController::class, 'form_save']);
        Route::get('dokter/edit/{id}', [AdminController::class, 'form_edit']);
        Route::post('dokter/update/{id}', [AdminController::class, 'form_update']);
        Route::get('dokter/delete/{id}', [AdminController::class, 'form_delete']);
        //AddHospital
        Route::get('/add/hospital', [\App\Http\Controllers\Admin\HospitalController::class, 'show'])->name('add.hospital');
        Route::post('/add/hospital', [\App\Http\Controllers\Admin\HospitalController::class, 'store'])->name('store.hospital');

        Route::get('/hospital/{hospital}/show', [\App\Http\Controllers\Admin\HospitalController::class, 'index'])->name('hospital.show');
        Route::get('/hospital/{hospital}/edit', [\App\Http\Controllers\Admin\HospitalController::class, 'edit'])->name('hospital.edit');
        Route::put('/hospital/{hospital}/edit', [\App\Http\Controllers\Admin\HospitalController::class, 'update'])->name('hospital.update');

        Route::delete('/add/hospital/{id}', [\App\Http\Controllers\Admin\HospitalController::class, 'delete'])->name('delete.hospital');
        //AddHospital

        //AddApotek
        Route::get('/add/apotek', [\App\Http\Controllers\Admin\ApotekController::class, 'show'])->name('add.apotek');
        Route::post('/add/apotek', [\App\Http\Controllers\Admin\ApotekController::class, 'store'])->name('store.apotek');

        Route::get('/apotek/{apotek}/show', [\App\Http\Controllers\Admin\ApotekController::class, 'index'])->name('apotek.show');
        Route::get('/apotek/{apotek}/edit', [\App\Http\Controllers\Admin\ApotekController::class, 'edit'])->name('apotek.edit');
        Route::put('/apotek/{apotek}/edit', [\App\Http\Controllers\Admin\ApotekController::class, 'update'])->name('apotek.update');


        Route::delete('/apotek/{id}', [\App\Http\Controllers\Admin\ApotekController::class, 'delete'])->name('delete.apotek');
        //AddApotek

        //Add Obat
        Route::get('/add/obat', [\App\Http\Controllers\Admin\ObatController::class, 'show'])->name('add.obat');
        Route::post('/add/obat', [\App\Http\Controllers\Admin\ObatController::class, 'store'])->name('store.obat');

        Route::get('/obat/{obat}/show', [\App\Http\Controllers\Admin\ObatController::class, 'index'])->name('obat.show');
        Route::get('/obat/{obat}/edit', [\App\Http\Controllers\Admin\ObatController::class, 'edit'])->name('obat.edit');
        Route::put('/obat/{obat}/edit', [\App\Http\Controllers\Admin\ObatController::class, 'update'])->name('obat.update');


        Route::delete('/obat/{id}', [\App\Http\Controllers\Admin\ObatController::class, 'delete'])->name('delete.obat');
        //Add Obat
    });

    Route::group(['middleware' => ['CekRoleMiddleware:2']], function () {
        // Route::resource('dokter', DokterController::class);
    });


});



Route::get('/kalkulatorbmi', [bmiController::class,'index']);
Route::post('/kalkulatorbmi', [bmiController::class, 'CalculateBMI'])->name('kalkulatorbmi.check');

Route::get('/resultbmi', [bmiController::class,'indexResult'])->name('result');
