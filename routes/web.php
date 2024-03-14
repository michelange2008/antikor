<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhytoprepController;
use App\Livewire\Aliments;
use App\Livewire\Aromaliste\Preparations;
use App\Livewire\Aromaliste\PreparationsListe;
use App\Livewire\Aromaliste\Produits;
use App\Livewire\Aromaliste\Composition;
use App\Livewire\Aromaliste\FormationsPreparations;
use App\Livewire\Formations\FormationCreate;
use App\Livewire\Formations\FormationEdit;
use App\Livewire\Formations\FormationIndex;
use App\Livewire\Formations\FormationShow;
use App\Livewire\Macros;
use App\Livewire\Oligos;
use App\Livewire\OligosParametres;
use App\Livewire\Roles;
use App\Livewire\Permissions;
use App\Livewire\Rations;
use App\Livewire\StadesRecoltes;
use App\Livewire\TypesAliments;
use App\Livewire\Users;

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

Route::get('/formations', FormationIndex::class)->name('formations.index');
Route::get('/formations/{formation}', FormationShow::class)->name('formations.show');

Route::get('/parasitisme', [FrontController::class, 'parasitisme'])->name('front.parasitisme');

Route::get('/reproduction', [FrontController::class, 'reproduction'])->name('front.reproduction');
Route::get('/antikor', [FrontController::class, 'antikor'])->name('front.antikor');

Route::get('/alim', [FrontController::class, 'alim'])->name('front.alim');
Route::prefix('/oligovitamines')->group(function () {
    Route::get('', Oligos::class)->name('oligos.outil');
    Route::get('/avertissement', [FrontController::class, 'avertissement'])->name('oligos.avertissement');
    Route::get('/parametres', OligosParametres::class)->name('oligos.parametres');
});
Route::prefix('/macroéléments')->group(function () {
    Route::get('', Macros::class)->name('macros.outil');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('/intranet')->middleware('auth', 'verified')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/aroma', [HomeController::class, 'aroma'])->name('aroma');
    Route::get('/visites', [HomeController::class, 'visites'])->name('visites');
    // Gestion des formations
    Route::get('/formations/create', FormationCreate::class)->name('formations.create');
    Route::get('/formations/edit/{formation}', FormationEdit::class)->name('formations.edit');

    Route::get('/produits', Produits::class)->name('produits');
    Route::get('/preparations', Preparations::class)->name('preparations');
    Route::get('/composition/{preparation_id}', Composition::class)->name('composition');
    Route::get('/formaprep', FormationsPreparations::class)->name('formapreps');
    
    Route::get('/preparation/composition/{preparation}', [PhytoprepController::class, 'edit'])->name('composition.edit');
    Route::post('/preparation/composition/{preparation}', [PhytoprepController::class, 'update'])->name('composition.update');


    Route::group(['middleware' => ['role:webmin']], function () {
        Route::get('/utilisateurs', Users::class)->name('users');
        Route::get('/roles', Roles::class)->name('roles');
        Route::get('/permissions', Permissions::class)->name('permissions');
        Route::get('/aliments', Aliments::class )->name('aliments');
        Route::get('/rations', Rations::class )->name('rations');
        Route::get('/types', TypesAliments::class );
        Route::get('/stades', StadesRecoltes::class );
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
