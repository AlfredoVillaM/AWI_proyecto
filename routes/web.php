<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard')->middleware('auth');
Route::get('/admin-libros', [AdminController::class, 'indexLibros'])->name('admin-libros.index')->middleware('auth');
Route::post('/admin-libros/save', [AdminController::class, 'saveLibro'])->name('admin-libros.save')->middleware('auth');
Route::post('/admin-libros/update/{id}', [AdminController::class, 'updateLibro'])->name('admin-libros.update')->middleware('auth');
Route::post('/admin-libros/delete/{id}', [AdminController::class, 'deleteLibro'])->name('admin-libros.delete')->middleware('auth');
Route::get('/admin-libros/show/{id}', [AdminController::class, 'showLibro'])->name('admin-libros.show')->middleware('auth');
Route::post('/admin-libros/resena/{id}/delete', [AdminController::class, 'deleteResena'])->name('admin-libros-resena.delete')->middleware('auth');
Route::get('/admin-prestamos', [AdminController::class, 'indexPrestamos'])->name('admin-prestamos.index')->middleware('auth');
Route::post('/admin-prestamos/update/{id}', [AdminController::class, 'updatePrestamo'])->name('admin-prestamos.update')->middleware('auth');
Route::get('/admin-libros-pdf', [AdminController::class, 'generateLibrosPdf'])->name('admin-libros.pdf')->middleware('auth');
Route::get('/admin-prestamos-pdf', [AdminController::class, 'generatePrestamosPdf'])->name('admin-prestamos.pdf')->middleware('auth');

Route::get('/client-dashboard', [ClientController::class, 'dashboard'])->name('client-dashboard')->middleware('auth');
Route::get('/client-libros', [ClientController::class, 'indexLibros'])->name('client-libros.index')->middleware('auth');
Route::get('/client-libros/show/{id}', [ClientController::class, 'showLibro'])->name('client-libros.show')->middleware('auth');
Route::post('/client-libros/resena/{libro_id}/save', [ClientController::class, 'saveResena'])->name('client-libros-resena.save')->middleware('auth');
Route::post('/client-libros/resena/{id}/update', [ClientController::class, 'updateResena'])->name('client-libros-resena.update')->middleware('auth');
Route::post('/client-libros/resena/{id}/delete', [ClientController::class, 'deleteResena'])->name('client-libros-resena.delete')->middleware('auth');
Route::get('/client-prestamos', [ClientController::class, 'indexPrestamos'])->name('client-prestamos.index')->middleware('auth');
Route::post('/client-libros/prestamo/{libro_id}/save', [ClientController::class, 'savePrestamo'])->name('client-libros-prestamo.save')->middleware('auth');
Route::get('/client-colecciones', [ClientController::class, 'indexColecciones'])->name('client-colecciones.index')->middleware('auth');
Route::post('/client-colecciones/save', [ClientController::class, 'saveColeccion'])->name('client-colecciones.save')->middleware('auth');
Route::post('/client-colecciones/update/{id}', [ClientController::class, 'updateColeccion'])->name('client-colecciones.update')->middleware('auth');
Route::post('/client-colecciones/delete/{id}', [ClientController::class, 'deleteColeccion'])->name('client-colecciones.delete')->middleware('auth');
Route::get('/client-colecciones/show/{id}', [ClientController::class, 'showColeccion'])->name('client-colecciones.show')->middleware('auth');
Route::post('/client-colecciones/libro/{libro_id}/save', [ClientController::class, 'saveColeccionLibro'])->name('client-colecciones-libro.save')->middleware('auth');
Route::post('/client-colecciones/{coleccion_id}/libro/{libro_id}/delete', [ClientController::class, 'deleteColeccionLibro'])->name('client-colecciones-libro.delete')->middleware('auth');