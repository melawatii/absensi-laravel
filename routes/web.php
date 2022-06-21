<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Models\Absen;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', function () {
    return view('index');
});

Route::resource('students', StudentController::class);
Route::resource('rombels', RombelController::class);
Route::resource('rayons', RayonController::class);
Route::resource('absens', AbsenController::class);
Route::resource('admins', AdminController::class);

Auth::routes();
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('admin.home')->middleware('is_admin');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/in', function () {
    Absen::updateOrCreate([
        'user_id' => Auth::id(),
        'jam_kedatangan' => date('H:i'),
        'keterangan' => 'Hadir'
    ]);
    return redirect()->route('home');
});

Route::post('/balik/{id}', function ($id) {
    Absen::where('user_id', $id)->update([
        'jam_kepulangan' => date('H:i'),
    ]);
    return redirect()->route('home');
});

Route::post('/reset', function () {
    Absen::truncate();
    return redirect()->route('absens.index');
});

Route::get('/out', function () {
    return view('users.comeOut');
});
Route::get('/absen', function () {
    return view('users.absence');
});


