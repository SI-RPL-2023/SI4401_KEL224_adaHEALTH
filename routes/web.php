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
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\FeedbackUserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportingController;
use App\Http\Controllers\Admin\ConfirmationController;
use Barryvdh\DomPDF\Facade as PDF;
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
Route::get('/history/{id}', [HistoryTransaction::class, 'show'])->name('detail.transaksi');

Route::get('/help', function () {
    return view('help', ['title'=>'Help']);
});
Route::post('/help', [HelpController::class, 'submitForm'])->name('submit.form');

Route::get('/', function () {
    return view('LandingPage', ['title' => 'Home']);
});
Route::get('/services', [ServicesController::class, 'index'])->name('index.services');
// route::get('/', [HomeController::class, "show"]);
// route::get('/redirects', [HomeController::class, "index"]);

route::post('/logout', [HomeController::class, "logout"])->name('logout');

// Route::get('/quiz', [SertifikasiController::class, 'index'])->name('quiz');
// Route::get('/quizs', [SertifikasiController::class, 'start'])->name('start');
// Route::post('/quiz/submit', [SertifikasiController::class, 'submit'])->name('quiz.submit');

Route::get('/sertifikasi-home', function () {
    return view('landingquiz');
})->name('landingquiz');

Route::get('/sertifkasi', [SertifikasiController::class, 'start'])
    ->name('quiz.start')
    ->middleware('auth');

Route::get('/sertifikasi/{questionNumber}', [SertifikasiController::class, 'show'])
    ->name('quiz.show')
    ->middleware('auth');

Route::post('/sertifikasi/submit', [SertifikasiController::class, 'submit'])
    ->name('quiz.submit')
    ->middleware('auth');

Route::get('/sertifikasi/result', [SertifikasiController::class, 'showResult'])
    ->name('quiz.result')
    ->middleware('auth');

Route::get('/sertifikasi/go-to/{questionNumber}', [SertifikasiController::class, 'goToQuestion'])
    ->name('quiz.goToQuestion')
    ->middleware('auth');

Route::post('/certificate/generate', [CertificateController::class, 'generate'])->name('certificate.generate');

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


Route::get('/hargadanjenisobat', function () {
    return view('hargadanjenisobat');
});

Route::get('/obats', [ObatController::class, 'index']);

Route::get('/obats/detail/{id}', [ObatController::class, 'show']);
Route::get('/obats/search', [ObatController::class, 'search'])->name('obat.search');
Route::post('/recommend', [ObatController::class, 'recommend'])->name('recommend');
Route::post('/obats/detail/{id}', [ObatController::class, 'store_pesan'])->name('obat.store_pesan');
Route::post('/transaksi/{id}', [ObatController::class, 'updateStatus'])->name('transaction.update');
Route::delete('/transaksi/{id}/cancel', [ObatController::class, 'cancel_order'])->name('cancel.order');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('reports');
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


    Route::get('dokter', [DokterController::class, 'dokter_view']);

    Route::get('dokter', [AdminController::class, 'dokter_view']);
        //Artikel


        Route::resource('artikel', \App\Http\Controllers\Admin\ArtikelController::class);
        Route::get('/artikel', [App\Http\Controllers\Admin\ArtikelController::class, 'index'])->name('artikel.index');
        Route::get('/artikel/create', [App\Http\Controllers\Admin\ArtikelController::class, 'create'])->name('artikel.create');
        Route::post('/artikel', [App\Http\Controllers\Admin\ArtikelController::class, 'store'])->name('artikel.store');
        Route::get('/artikel/{article}',  [App\Http\Controllers\Admin\ArtikelController::class, 'show'])->name('artikel.show');
        Route::get('/artikel/{id}/edit', [App\Http\Controllers\Admin\ArtikelController::class, 'edit'])->name('artikel.edit');
        Route::put('/artikel/{id}/update', [App\Http\Controllers\Admin\ArtikelController::class, 'update'])->name('artikel.update');
        Route::get('/artikel/{id}',  [App\Http\Controllers\Admin\ArtikelController::class, 'destroy'])->name('artikel.destroy');

        Route::get('/search', [App\Http\Controllers\Admin\ArtikelController::class, 'search'])->name('artikel.search');


        //End artikel
    Route::group(['middleware' => ['CekRoleMiddleware:0']], function () {
        Route::resource('/user', UserController::class);
        Route::get('riwayat-konsultasi', [UserController::class, 'riwayat_konsultasi']);
        //Route untuk Fitur Feedback CRUD
        Route::get('/feedback', [FeedbackUserController::class, 'show'])->name('feedback.show');
        Route::post('/feedback', [FeedbackUserController::class, 'store'])->name('feedback.store');
        Route::put('/feedback/{id}', [FeedbackUserController::class, 'update'])->name('feedback.update');
        // Route::delete('/feedback/{id}', [FeedbackUserController::class, 'destroy'])->name('feedback.destroy');
        //End Route untuk Fitur Feedback CRUD
    });

    Route::group(['middleware' => ['CekRoleMiddleware:1']], function () {
        Route::resource('dashboard', \App\Http\Controllers\Admin\DashboardController::class);

    
;
        


        Route::get('/dashboard', [ReportingController::class, 'index'])->name('reports.index');
        Route::get('/reporting', [\App\Http\Controllers\Admin\ReportingController::class, 'report'])->name('detail.report');
        Route::get('/download-transactions/{period?}', [\App\Http\Controllers\Admin\ReportingController::class, 'downloadTransactions'])->name('download.transactions');


      
        //Add Dokter
        Route::get('dokter/add', [AdminController::class, 'form_tambah']);
        Route::post('dokter/save', [AdminController::class, 'form_save']);
        Route::get('dokter/edit/{id}', [AdminController::class, 'form_edit']);
        Route::post('dokter/update/{id}', [AdminController::class, 'form_update']);
        Route::get('dokter/delete/{id}', [AdminController::class, 'form_delete']);
        //End Add DOkter
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

        //Transaksi Konfirm
        Route::get('/transaksi', [\App\Http\Controllers\Admin\ConfirmationController::class, 'index'])->name('index.show');
        Route::get('/transaksi/{id}/edit', [\App\Http\Controllers\Admin\ConfirmationController::class, 'edit'])->name('show.edit');
        Route::post('/transaksi/{id}/edit', [\App\Http\Controllers\Admin\ConfirmationController::class, 'update'])->name('show.update');
        Route::get('/transaksi/{id}/delete', [\App\Http\Controllers\Admin\ConfirmationController::class, 'destroy'])->name('show.delete');
        //end Konfirm

    });

    Route::group(['middleware' => ['CekRoleMiddleware:2']], function () {
        Route::get('konsultasi/add', [DokterController::class, 'form_konsultasi']);
        Route::post('konsultasi/save', [DokterController::class, 'save_konsultasi']);
        Route::get('konsultasi/edit/{id}', [DokterController::class, 'form_konsultasi_edit']);
        Route::post('konsultasi/update/{id}', [DokterController::class, 'form_konsultasi_update']);
        Route::get('konsultasi/delete/{id}', [DokterController::class, 'form_konsultasi_delete']);

    });


});



Route::get('/kalkulatorbmi', [bmiController::class,'index']);
Route::post('/kalkulatorbmi', [bmiController::class, 'CalculateBMI'])->name('kalkulatorbmi.check');


Route::get('/resultbmi', [bmiController::class,'indexResult'])->name('result');
Route::get('/kategoriobat', [ObatController::class, 'kategoriobat'])->name('kategoriobat');
Route::get('/kategoriobat/{kategori}', [ObatController::class, 'obatkategori'])->name('obatkategori');
Route::post('/hapusfoto/{id}', [UserController::class, 'hapusfoto'])->name('hapusfoto');

Route::get('/resultbmi', [bmiController::class,'indexResult'])->name('result');


Route::get('/suratrujukan', function () {
    return view('suratrujukan');
});

Route::get('/hasilsuratpdf', function () {
    return view('hasilsuratpdf');
});

Route::post('/generate-pdf', [PDFController::class, 'generatePDF'])->name('generate-pdf');

