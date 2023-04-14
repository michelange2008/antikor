<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhytoprepController;
use App\Http\Controllers\PhytoproduitController;
use App\Http\Livewire\PreparationsListe;
use App\Http\Livewire\CompositionEdit;

use App\Http\Livewire\ShowUsers;

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

Route::get('/', [FrontController::class, 'index'])->name('front.index');

Route::get('/Formations', [FrontController::class, 'formations'])->name('front.formations');
Route::get('/Parasitisme', [FrontController::class, 'parasitisme'])->name('front.parasitisme');
Route::get('/Reproduction', [FrontController::class, 'reproduction'])->name('front.reproduction');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('intranet')->middleware('auth', 'verified')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/aroma', [HomeController::class, 'aroma'])->name('aroma');
    Route::get('/visites', [HomeController::class, 'visites'])->name('visites');
    Route::resource('/formations', FormationController::class);
    // Route::resource('/preparations', PhytoprepController::class);
    Route::get('/preparations', PreparationsListe::class)->name('preparations.index');

    Route::get('/preparation/composition/{preparation}', [PhytoprepController::class, 'edit'])->name('composition.edit');
    Route::post('/preparation/composition/{preparation}', [PhytoprepController::class, 'update'])->name('composition.update');
    
    Route::resource('/produits', PhytoproduitController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
