<?php

use App\Http\Controllers\ContrainteController;
use App\Http\Controllers\RessourceController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PieceJointeController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\RegleGestionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TypeProjetController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('type_projets', TypeProjetController::class);



//Routes Admin--Utilisateurs
Route::get('admins/utilisateurs/profile',[App\Http\Controllers\Admins\UtilisateurController::class, "edit2"])->name("utilisateurs.edit2");
Route::put('admins/utilisateurs/profileupdate',[App\Http\Controllers\Admins\UtilisateurController::class, "update2"])->name("utilisateurs.update2");
Route::get('admins/utilisateurs',[App\Http\Controllers\Admins\UtilisateurController::class, "index"])->name("admins.utilisateurs");
Route::delete('admins/utilisateurs/delete/{user}',[App\Http\Controllers\Admins\UtilisateurController::class, "delete"])->name("utilisateurs.supprimer");
Route::get('admins/utilisateurs/create',[App\Http\Controllers\Admins\UtilisateurController::class, "create"])->name("utilisateurs.create");
Route::post('admins/utilisateurs/create',[App\Http\Controllers\Admins\UtilisateurController::class, "store"])->name("utilisateurs.ajouter");
Route::get('admins/utilisateurs/{utilisateur}',[App\Http\Controllers\Admins\UtilisateurController::class, "edit"])->name("utilisateurs.edit");
Route::put('admins/utilisateurs/{utilisateur}',[App\Http\Controllers\Admins\UtilisateurController::class, "update"])->name("utilisateurs.update");


//Routes Decideur
/* Route::middleware(['auth', 'can:decideur-access'])->group(function () {
    Route::resource('decideur/type_projets', 'Decideur\TypeProjetController');
    Route::resource('decideur/ressources', 'Decideur\RessourceController');
    Route::resource('decideur/contraintes', 'Decideur\ContrainteController');
    Route::resource('decideur/regles_gestions', 'Decideur\RegleGestionController');
}); */


Route::controller(TypeProjetController::class)->prefix('type_projets')->name('type_projets')->group(function () {
    Route::get('/', 'index')->name("");
    Route::get('/create', 'create')->name(".create");
    Route::post('/create', 'store')->name(".ajouter");
    Route::get('/{type_projet}', 'edit')->name(".edite");
    Route::put('/{type_projet}', 'update')->name(".updates");
    Route::delete('/{type_projet}', 'delete')->name(".supprimer");

});

Route::controller(ProjetController::class)->prefix('projets')->name('projets')->group(function () {
    Route::get('/', 'index')->name("");
    Route::get('/create', 'create')->name(".create");
    Route::post('/create', 'store')->name(".ajouter");
    Route::get('/{projet}', 'edit')->name(".edit");
    Route::put('/{projet}', 'update')->name(".update");
    Route::delete('/{projet}', 'delete')->name(".supprimer");
    Route::get('/details_projet/{projet}', 'details')->name(".details");

});

Route::controller(RessourceController::class)->prefix('ressources')->name('ressources')->group(function () {
    Route::get('/', 'index')->name("");
    Route::get('/create', 'create')->name(".create");
    Route::post('/create', 'store')->name(".ajouter");
    Route::get('/{ressource}', 'edit')->name(".edit");
    Route::put('/{ressource}', 'update')->name(".update");
    Route::delete('/{ressource}', 'delete')->name(".supprimer");

});

Route::controller(RegleGestionController::class)->prefix('regle_gestions')->name('regle_gestions')->group(function () {
    Route::get('/', 'index')->name("");
    Route::get('/create', 'create')->name(".create");
    Route::post('/create', 'store')->name(".ajouter");
    Route::get('/{regle_gestion}', 'edit')->name(".edit");
    Route::put('/{regle_gestion}', 'update')->name(".update");
    Route::delete('/{regle_gestion}', 'delete')->name(".supprimer");

});

Route::controller(ContrainteController::class)->prefix('contraintes')->name('contraintes')->group(function () {
    Route::get('/', 'index')->name("");
    Route::get('/create', 'create')->name(".create");
    Route::post('/create', 'store')->name(".ajouter");
    Route::get('/{contrainte}', 'edit')->name(".edit");
    Route::put('/{contrainte}', 'update')->name(".update");
    Route::delete('/{contrainte}', 'delete')->name(".supprimer");

});

Route::controller(PieceJointeController::class)->prefix('piece_jointes')->name('piece_jointes')->group(function () {
    Route::get('/', 'index')->name("");
    Route::get('/create', 'create')->name(".create");
    Route::post('/create', 'store')->name(".ajouter");
    Route::get('/{piece_jointe}', 'edit')->name(".edit");
    Route::put('/{piece_jointe}', 'update')->name(".update");
    Route::delete('/{piece_jointe}', 'delete')->name(".supprimer");

});

Route::controller(TacheController::class)->prefix('taches')->name('taches')->group(function () {
    Route::get('/', 'index')->name("");
    Route::get('/create', 'create')->name(".create");
    Route::post('/create', 'store')->name(".ajouter");
    Route::get('/{tache}', 'edit')->name(".edit");
    Route::put('/{tache}', 'update')->name(".update");
    Route::delete('/{tache}', 'delete')->name(".supprimer");
    Route::put('/update-task-status/{taskId}', 'updateTaskStatus')->name(".updateTaskStatus");

});


});




Route::get('generate-pdf/{projet}', [PDFController::class, 'generatePDF'])->name("projetDetails.print");
Route::get('pdf/taches', [TacheController::class, 'generateRapport'])->name("etatTaches.print");

Route::post('/sendmessage', [MessageController::class, 'saveMessage'])->name('messages.save');




