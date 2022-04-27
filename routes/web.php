<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrateur\ProfesseurController;
use App\Http\Controllers\Administrateur\filiereController;
use App\Http\Controllers\Administrateur\NiveauController;
use App\Http\Controllers\Administrateur\GroupeController;
use App\Http\Controllers\Administrateur\MatiereController;
use App\Http\Controllers\Administrateur\ExamenController;
use App\Http\Controllers\Administrateur\SalleController;


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
    return view('welcome');
});

Auth::routes();

Route::controller(filiereController::class)->prefix('filiere')->group(function () {
    Route::post('/insert', 'insert')->name('InsertFiliere');
    Route::post('/update', 'update')->name('UpdateFiliere');
    Route::get('/delete', 'delete')->name('deletefiliere');
    Route::get('/getAll', 'getall')->name('getAllfiliere');
});
Route::controller(NiveauController::class)->prefix('niveau')->group(function () {
    Route::post('/insert', 'insert')->name('insertNiveau');
    Route::post('/update', 'update')->name('UpdateNiveau');
    Route::post('/delete', 'delete')->name('DeleteNiveau');
    Route::get('/getId', 'get')->name('getIdNiveau');
    Route::get('/getAll','getall')->name('getallNiveau');

});
Route::controller(GroupeController::class)->prefix('groupe')->group(function () {
    Route::post('/insert', 'insert')->name('insertGroupe');
    Route::post('/update', 'update')->name('UpdateGroupe');
    Route::post('/delete', 'delete')->name('DeleteGroupe');
    Route::get('/getId', 'get')->name('getIdGroupe');
    Route::get('/getAll','getall')->name('getallGroupe');
});
Route::controller(ProfesseurController::class)->prefix('professeur')->group(function () {
    Route::post('/insert', 'insert')->name('insertProfesseur');
    Route::post('/update', 'update')->name('UpdateProfesseur');
    Route::post('/delete', 'delete')->name('DeleteProfesseur');
    Route::get('/getId', 'get')->name('getIdProfesseur');
    Route::get('/getAll','getall')->name('getallProfesseur');
});
Route::controller(MatiereController::class)->prefix('matiere')->group(function () {
    Route::post('/insert', 'insert')->name('insertMatiere');
    Route::post('/update', 'update')->name('UpdateMatiere');
    Route::post('/delete', 'delete')->name('DeleteMatiere');
    Route::get('/getId', 'get')->name('getIdMatiere');
    Route::get('/getAll','getall')->name('getallMatiere');
});
Route::controller(ExamenController::class)->prefix('exmane')->group(function () {
    Route::post('/insert', 'insert')->name('insertExamen');
    Route::post('/update', 'update')->name('UpdateExamen');
    Route::post('/delete', 'delete')->name('DeleteExamen');
    Route::get('/getId', 'get')->name('getIdExamen');
    Route::get('/getAll','getall')->name('getallExamen');
});

Route::controller(SalleController::class)->prefix('salle')->group(function () {
    Route::post('/insert', 'insert')->name('insertSalle');
    Route::post('/update', 'update')->name('UpdateSalle');
    Route::post('/delete', 'delete')->name('DeleteSalle');
    Route::get('/getId', 'get')->name('getIdSalle');
    Route::get('/getAll','getall')->name('getallSalle');

});
//Route::post('/insertFiliere', [filiereController::class, 'insert'])->name('InsertFiliere');
//Route::post('/insertniveau', [NiveauController::class, 'insert'])->name('insertniveau');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/Professeurs', [ProfesseurController::class, 'index'])->name('Professeurs');
