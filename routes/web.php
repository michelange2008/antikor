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
use App\Livewire\Oligos;
use App\Livewire\OligosParametres;
use App\Livewire\ProgrammeFormEdit;
use App\Livewire\ProgrammeForms;
use App\Livewire\ProgrammeSoustitreEdit;
use App\Livewire\Roles;
use App\Livewire\ShowUsers;
use App\Livewire\Permissions;
use App\Livewire\Users;
use App\Models\User;

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

Route::prefix('/oligovitamines')->group(function () {
    Route::get('', Oligos::class)->name('oligos.outil');
    Route::get('/avertissement', [FrontController::class, 'avertissement'])->name('oligos.avertissement');
    Route::get('/parametres', OligosParametres::class)->name('oligos.parametres');
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

    Route::get('/preparations', PreparationsListe::class)->name('preparations.index');
    Route::get('/preparation/composition/{preparation}', [PhytoprepController::class, 'edit'])->name('composition.edit');
    Route::post('/preparation/composition/{preparation}', [PhytoprepController::class, 'update'])->name('composition.update');

    Route::resource('/produits', PhytoproduitController::class);

    Route::group(['middleware' => ['role:webmin']], function () {
        Route::get('/utilisateurs', Users::class)->name('users');
        Route::get('/roles', Roles::class)->name('roles');
        Route::get('/permissions', Permissions::class)->name('permissions');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
