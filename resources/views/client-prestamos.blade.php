<x-base>
    <h1 class="text-5xl font-bold">Mis Préstamos</h1>
    
    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
            <thead>
                <tr>
                    <th>Libro</th>
                    <th>Fecha de Préstamo</th>
                    <th>Fecha Límite</th>
                    <th>Fecha de Devolución</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($prestamos as $prestamo)
                <tr>
                    <td>{{ $prestamo->libro->titulo }}</td>
                    <td>{{ $prestamo->fecha_prestamo }}</td>
                    <td>{{ $prestamo->fecha_limite }}</td>
                    <td>{{ $prestamo->fecha_devolucion ?? '~' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-base>
