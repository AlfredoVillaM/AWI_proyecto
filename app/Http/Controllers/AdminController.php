<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Prestamo;
use App\Models\Resena;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function dashboard() {
        $totalLibros = Libro::count();
        $prestamosPendientes = Prestamo::whereNull('fecha_devolucion')->count();

        $response = Http::withoutVerifying()->get('https://www.positive-api.online/phrase/esp');

        $fraseDelDia = $response->successful()
            ? $response->json()['text']
            : 'No se pudo obtener la frase del día.';

        return view('admin-dashboard', compact('totalLibros', 'prestamosPendientes', 'fraseDelDia'));
    }

    public function indexLibros() {
        $libros = Libro::orderBy('created_at', 'desc')->get();
        return view('admin-libros', compact('libros'));
    }

    public function saveLibro(Request $request) {
        $libro = new Libro();
        $libro->titulo = $request->input('titulo');
        $libro->autor  = $request->input('autor');
        $libro->isbn = $request->input('isbn');
        $libro->editorial = $request->input('editorial');
        $libro->sinopsis = $request->input('sinopsis');
        $libro->fecha_publicacion = $request->input('fecha_publicacion');

        // Conversión de imagen a Base64
        if ($request->hasFile('portada')) {
            $imagen = $request->file('portada');
            $contenido = file_get_contents($imagen->getRealPath());
            $base64 = base64_encode($contenido);

            // Prefijo opcional para mostrar como <img src="">
            $mime = $imagen->getClientMimeType();
            $libro->portada_base64 = "data:$mime;base64,$base64";
        }

        $libro->save();
        return redirect()->back();
    }

    public function updateLibro(Request $request, $id) {
        $libro = Libro::find($id);
        $libro->titulo = $request->input('titulo');
        $libro->autor  = $request->input('autor');
        $libro->isbn = $request->input('isbn');
        $libro->editorial = $request->input('editorial');
        $libro->sinopsis = $request->input('sinopsis');
        $libro->fecha_publicacion = $request->input('fecha_publicacion');

        // Actualización de la portada si se proporciona una nueva imagen
        if ($request->hasFile('portada')) {
            $imagen = $request->file('portada');
            $contenido = file_get_contents($imagen->getRealPath());
            $base64 = base64_encode($contenido);

            // Prefijo opcional para mostrar como <img src="">
            $mime = $imagen->getClientMimeType();
            $libro->portada_base64 = "data:$mime;base64,$base64";
        }

        $libro->save();
        return redirect()->back();
    }

    public function deleteLibro($id) {
        $libro = Libro::find($id);
        $libro->delete();
        return redirect()->back();
    }

    public function showLibro($id) {
        $libro = Libro::find($id);
        $resenas = Resena::where('libro_id', $id)->orderBy('fecha', 'desc')->get();
        return view('admin-libro', compact('libro', 'resenas'));
    }

    public function deleteResena($id) {
        $resena = Resena::find($id);
        $resena->delete();
        return redirect()->back();
    }

    public function indexPrestamos() {
        $prestamos = Prestamo::orderBy('created_at', 'desc')->get();
        return view('admin-prestamos', compact('prestamos'));
    }

    // Marcar devolución de un préstamo
    public function updatePrestamo(Request $request, $id) {
        $prestamo = Prestamo::find($id);
        $prestamo->fecha_devolucion = today();
        $prestamo->save();
        return redirect()->back();
    }

    public function generateLibrosPdf() {
        $libros = Libro::all();

        $html = view('admin-libros-pdf', compact('libros'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Letter', 'portrait');
        $dompdf->render();

        return $dompdf->stream('libros.pdf');
    }
    
    public function generatePrestamosPdf() {
        $prestamos = Prestamo::whereNotNull('fecha_devolucion')->get();

        $html = view('admin-prestamos-pdf', compact('prestamos'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Letter', 'portrait');
        $dompdf->render();

        return $dompdf->stream('prestamos.pdf');
    }
}
