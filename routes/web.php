<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/redirect', [AdminController::class, 'index'])->name('redirect');
    
});

Route::prefix('finance')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin', // Middleware to check if the user is an admin
])->group(function () {
    Route::view('/home-app', 'pages.page-home-app')->name('homeAdmin');
    Route::view('/dashboard', 'pages.page-dashboard')->name('dashboard-finance');
    /***********************************************
    * GESTION DES CLASSE
     **********************************************/
    Route::view('/classe', 'pages.page-classe')->name('classe');
    Route::view('/mensualite', 'pages.page-mensualite')->name('mensualite');
    Route::view('/inscription', 'pages.page-inscription')->name('inscription');
    Route::view('/reporting', 'pages.page-dashboard')->name('reporting');
    Route::view('/inscription/subscription/{inscription}', 'pages.page-ins-etudiant')->name('submit');
    /***********************************************
    * FRAIS DE SCOLARITE
     **********************************************/
    Route::view('/frais-inscription', 'pages.page-frais-inscription')->name('frais-ins');
    Route::view('/frais-mensualite', 'pages.page-frais-mensualite')->name('frais-mens');
    
    /************************************************
    * Etudiants
    ************************************************ */
    Route::view('/etudiant', 'pages.page-etudiant')->name('etudiant');
    Route::view('/etudiant/profil/{etudiant}', 'pages.page-profil-etudiant')->name('etudiant.profil');
    
});

/************************************************
    * Parametrages
************************************************ */
Route::prefix('parametrage')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin', // Middleware to check if the user is an admin
])->group(function () {
     Route::view('/annee', 'pages.page-annee')->name('annee');
    Route::view('/specialite', 'pages.page-specialite')->name('specialite');
    Route::view('/niveau', 'pages.page-niveau')->name('niveau');
    Route::view('/nationnalite', 'pages.page-nationnalite')->name('nationnalite');
    Route::view('/parametrage', 'pages.page-parametrage')->name('parametrage');
    Route::view('/rentre', 'pages.page-rentre')->name('rentre');
    Route::view('/etablissement-boursier', 'pages.page-etat-boursier')->name('etablissement-boursier');
    Route::view('/mode-paiement', 'pages.page-mode-paiement')->name('mode-paiement');
});