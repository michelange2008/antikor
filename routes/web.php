<?php

use App\Formations\Livewire\FormationCreate as LivewireFormationCreate;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhytoprepController;
use App\Http\Controllers\PhytoproduitController;
use App\Livewire\PreparationsListe;
use App\Livewire\CompositionEdit;
use App\Livewire\Formations\FormationCreate;
use App\Livewire\Formations\FormationEdit;
use App\Livewire\Formations\FormationIndex;
use App\Livewire\Formations\FormationShow;
use App\Livewire\ProgrammeFormEdit;
use App\Livewire\ProgrammeForms;
use App\Livewire\ProgrammeSoustitreEdit;
use App\Livewire\ShowUsers;

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
Route::get('/Formations/{formation}', [FrontController::class, 'formationShow'])->name('front.formationShow');
Route::get('/Parasitisme', [FrontController::class, 'parasitisme'])->name('front.parasitisme');
Route::get('/Reproduction', [FrontController::class, 'reproduction'])->name('front.reproduction');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('/intranet')->middleware('auth', 'verified')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/aroma', [HomeController::class, 'aroma'])->name('aroma');
    Route::get('/visites', [HomeController::class, 'visites'])->name('visites');
    // Affichage et gestion des formations
    Route::get('/formations', FormationIndex::class)->name('formations.index');
    Route::get('/formations/create', FormationCreate::class)->name('formations.create');
    Route::get('/formations/edit/{formation}', FormationEdit::class)->name('formations.edit');
    Route::get('/formations/{formation}', FormationShow::class)->name('formations.show');

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
