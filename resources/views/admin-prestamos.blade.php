<x-base>
    <h1 class="text-5xl font-bold">Préstamos</h1>

    <a href="{{ route('admin-prestamos.pdf') }}" class="btn btn-primary">Descargar</a>
    
    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
            <thead>
                <tr>
                    <th>Libro</th>
                    <th>Usuario</th>
                    <th>Fecha de Préstamo</th>
                    <th>Fecha Límite</th>
                    <th>Fecha de Devolución</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($prestamos as $prestamo)
                <tr>
                    <td>{{ $prestamo->libro->titulo }}</td>
                    <td>{{ $prestamo->user->name }}</td>
                    <td>{{ $prestamo->fecha_prestamo }}</td>
                    <td>{{ $prestamo->fecha_limite }}</td>
                    <td>{{ $prestamo->fecha_devolucion ?? '~' }}</td>
                    <td>
                        <button
                            class="btn"
                            onclick="document.getElementById('update-{{ $prestamo->id }}').showModal()"
                            @if($prestamo->fecha_devolucion) disabled @endif
                        >
                            Marcar devolución
                        </button>
                    </td>
                </tr>

                <dialog id="update-{{ $prestamo->id }}" class="modal">
                    <div class="modal-box">
                        <h3 class="text-lg font-bold">Marcar Devolución</h3>
                        <form method="POST" action="{{ route('admin-prestamos.update', $prestamo->id) }}">
                            @csrf
                            <p>¿Estás seguro de que deseas marcar la devolución del libro "{{ $prestamo->libro->titulo }}"?</p>
                            <button type="submit" class="btn btn-neutral">Confirmar</button>
                        </form>
                        <div class="modal-action">
                            <form method="dialog">
                                <!-- if there is a button in form, it will close the modal -->
                                <button class="btn">Close</button>
                            </form>
                        </div>
                    </div>
                </dialog>
            @endforeach
            </tbody>
        </table>
    </div>
</x-base>
