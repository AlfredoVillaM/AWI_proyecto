<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user && $user->role === 'admin') {
        return redirect()->route('admin-dashboard');
    } elseif ($user && $user->role === 'client') {
        return redirect()->route('client-dashboard');
    }

    return view('dashboard');
})->name('dashboard');

Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
Route::get('/admin-libros', [AdminController::class, 'indexLibros'])->name('admin-libros.index');
Route::post('/admin-libros/save', [AdminController::class, 'saveLibro'])->name('admin-libros.save');
Route::post('/admin-libros/update/{id}', [AdminController::class, 'updateLibro'])->name('admin-libros.update');
Route::post('/admin-libros/delete/{id}', [AdminController::class, 'deleteLibro'])->name('admin-libros.delete');
Route::get('/admin-libros/show/{id}', [AdminController::class, 'showLibro'])->name('admin-libros.show');
Route::post('/admin-libros/resena/{id}/delete', [AdminController::class, 'deleteResena'])->name('admin-libros-resena.delete');
Route::get('/admin-prestamos', [AdminController::class, 'indexPrestamos'])->name('admin-prestamos.index');
Route::post('/admin-prestamos/update/{id}', [AdminController::class, 'updatePrestamo'])->name('admin-prestamos.update');

Route::get('/client-dashboard', [ClientController::class, 'dashboard'])->name('client-dashboard');
Route::get('/client-libros', [ClientController::class, 'indexLibros'])->name('client-libros.index');
Route::get('/client-libros/show/{id}', [ClientController::class, 'showLibro'])->name('client-libros.show');
Route::post('/client-libros/resena/{libro_id}/save', [ClientController::class, 'saveResena'])->name('client-libros-resena.save');
Route::post('/client-libros/resena/{id}/update', [ClientController::class, 'updateResena'])->name('client-libros-resena.update');
Route::post('/client-libros/resena/{id}/delete', [ClientController::class, 'deleteResena'])->name('client-libros-resena.delete');
Route::get('/client-prestamos', [ClientController::class, 'indexPrestamos'])->name('client-prestamos.index');
Route::get('/client-libros/prestamo/{libro_id}/save', [ClientController::class, 'savePrestamo'])->name('client-libros-prestamo.save');
Route::get('/client-colecciones', [ClientController::class, 'indexColecciones'])->name('client-colecciones.index');
Route::post('/client-colecciones/save', [ClientController::class, 'saveColeccion'])->name('client-colecciones.save');
Route::post('/client-colecciones/delete/{id}', [ClientController::class, 'deleteColeccion'])->name('client-colecciones.delete');
Route::post('/client-colecciones/show/{id}', [ClientController::class, 'showColeccion'])->name('client-colecciones.show');
Route::post('/client-colecciones/libro/{libro_id}/save', [ClientController::class, 'saveColeccionLibro'])->name('client-colecciones-libro.save');
Route::post('/client-colecciones/libro/{libro_id}/delete', [ClientController::class, 'deleteColeccionLibro'])->name('client-colecciones-libro.delete');
