<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Resena;
use App\Models\Prestamo;
use App\Models\Coleccion;
use App\Models\ColeccionLibro;

class ClientController extends Controller
{
    public function dashboard() {
        return view('client-dashboard');
    }

    public function indexLibros() {
        $libros = Libro::all();
        $colecciones = Coleccion::where('user_id', auth()->user()->id)->get();
        return view('client-libros', compact('libros', 'colecciones'));
    }

    public function showLibro($id) {
        $libro = Libro::find($id);
        $resenas = Resena::where('libro_id', $id)->orderBy('fecha', 'desc')->get();
        $colecciones = Coleccion::where('user_id', auth()->user()->id)->get();
        return view('client-libro', compact('libro', 'resenas', 'colecciones'));
    }

    public function saveResena(Request $request, $libro_id) {
        $resena = new Resena();
        $resena->libro_id = $libro_id;
        $resena->user_id = auth()->user()->id;
        $resena->fecha = now();
        $resena->calificacion = $request->input('calificacion');
        $resena->comentario = $request->input('comentario');
        $resena->save();
        return redirect()->back();
    }

    public function updateResena(Request $request, $id) {
        $resena = Resena::find($id);
        $resena->calificacion = $request->input('calificacion');
        $resena->comentario = $request->input('comentario');
        $resena->save();
        return redirect()->back();
    }

    public function deleteResena($id) {
        $resena = Resena::find($id);
        $resena->delete();
        return redirect()->back();
    }

    public function indexPrestamos() {
        $prestamos = Prestamo::where('user_id', auth()->user()->id)->get();
        return view('client-prestamos', compact('prestamos'));
    }

    public function savePrestamo(Request $request, $libro_id) {
        $prestamo = new Prestamo();
        $prestamo->libro_id = $libro_id;
        $prestamo->user_id = auth()->user()->id;
        $prestamo->fecha_prestamo = now();
        $prestamo->fecha_limite = now()->addWeeks(2); // 2 semanas para devolver
        $prestamo->save();

        return redirect()->back();
    }

    public function indexColecciones() {
        $colecciones = Coleccion::where('user_id', auth()->user()->id)->get();
        return view('client-colecciones', compact('colecciones'));
    }

    public function saveColeccion(Request $request) {
        $coleccion = new Coleccion();
        $coleccion->nombre = $request->input('nombre');
        $coleccion->user_id = auth()->user()->id;
        $coleccion->save();
        return redirect()->back();
    }

    public function deleteColeccion($id) {
        $coleccion = Coleccion::find($id);
        $coleccion->delete();
        return redirect()->back();
    }

    public function showColeccion($id) {
        $coleccion = Coleccion::find($id);
        $libros = Libro::whereIn('id', function($query) use ($id) {
            $query->select('libro_id')
                  ->from('coleccion_libros')
                  ->where('coleccion_id', $id);
        })->get();
        return view('client-coleccion', compact('coleccion', 'libros'));
    }

    public function saveColeccionLibro(Request $request, $libro_id) {
        $coleccionLibro = new ColeccionLibro();
        $coleccionLibro->libro_id = $libro_id;
        $coleccionLibro->coleccion_id = $request->input('coleccion_id');
        $coleccionLibro->save();
        return redirect()->back();
    }

    public function deleteColeccionLibro($id) {
        $coleccionLibro = ColeccionLibro::find($id);
        $coleccionLibro->delete();
        return redirect()->back();
    }
}
