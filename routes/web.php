<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RicettaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('home.home');
});

Route::resource('ricette', RicettaController::class)->middleware(['auth'])->except(['index']);

Route::get('/ricette',[RicettaController::class,'index'])->name('ricette.index');

// Route::get('/register', [RegisterController::class, 'show'])->name('register');

// Route::post('/register', [RegisterController::class, 'store']);
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ROTTE ADMIN
// Mostra l'elenco degli utenti
Route::get('/admin/users', [UserController::class, 'index'])->name('utenti.lista');

// Mostra il form di creazione
Route::get('/admin/users/create', [UserController::class, 'create'])->name('utenti.nuovo');

// Salva un nuovo utente
Route::post('/admin/users', [UserController::class, 'store'])->name('utenti.salva');

// Mostra il dettaglio di un utente
Route::get('/admin/users/{user}', [UserController::class, 'show'])->name('utenti.dettaglio');

// Mostra il form di modifica
Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('utenti.modifica');

// Aggiorna un utente
Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('utenti.aggiorna');

// Elimina un utente
Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('utenti.elimina');

// Rotta pannello dropdown Admin
Route::get('/admin/altro', [RicettaController::class, 'altro'])->name('altro.pannello');

