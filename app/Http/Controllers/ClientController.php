<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Resena;
use App\Models\Prestamo;
use App\Models\Coleccion;
use App\Models\ColeccionLibro;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\Correo;

class ClientController extends Controller
{
    public function dashboard() {
        $prestamosPendientes = Prestamo::with('libro')
        ->where('user_id', auth()->user()->id)
        ->whereNull('fecha_devolucion')
        ->count();
        $totalColecciones = Coleccion::where('user_id', auth()->user()->id)->count();

        $response = Http::withoutVerifying()->get('https://www.positive-api.online/phrase/esp');

        $fraseDelDia = $response->successful()
            ? $response->json()['text']
            : 'No se pudo obtener la frase del día.';

        return view('client-dashboard', compact('prestamosPendientes', 'totalColecciones', 'fraseDelDia'));
    }

    public function indexLibros() {
        $libros = Libro::orderBy('created_at', 'desc')->get();
        return view('client-libros', compact('libros'));
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
        $prestamos = Prestamo::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('client-prestamos', compact('prestamos'));
    }

    public function savePrestamo(Request $request, $libro_id) {
        $prestamo = new Prestamo();
        $prestamo->libro_id = $libro_id;
        $prestamo->user_id = auth()->user()->id;
        $prestamo->fecha_prestamo = now();
        $prestamo->fecha_limite = now()->addWeeks(2); // 2 semanas para devolver
        $prestamo->save();
        Mail::to(auth()->user()->email)->send(new Correo($prestamo));
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

    public function updateColeccion(Request $request, $id) {
        $coleccion = Coleccion::find($id);
        $coleccion->nombre = $request->input('nombre');
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

    public function deleteColeccionLibro($coleccion_id, $libro_id) {
        $coleccionLibro = ColeccionLibro::where('libro_id', $libro_id)
            ->where('coleccion_id', $coleccion_id)
            ->first();
        $coleccionLibro->delete();
        return redirect()->back();
    }
}
