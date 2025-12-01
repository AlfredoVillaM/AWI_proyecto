<x-base>
    <a href="{{ route('client-libros.index') }}" class="btn btn-secondary mt-6">Volver</a>

    <div class="card lg:card-side bg-base-100 shadow-sm">
        <figure>
            <img src="{{ $libro->portada_base64 }}" />
        </figure>
        <div class="card-body">
            <h2 class="card-title">{{ $libro->titulo }}</h2>
            <p class="text-lg">ISBN: {{ $libro->isbn }}</p>
            <p class="text-lg">Autor: {{ $libro->autor }}</p>
            <p class="text-lg">Editorial: {{ $libro->editorial }}</p>
            <p class="text-lg">Fecha de publicación: {{ $libro->fecha_publicacion }}</p>
            <h3 class="text-2xl font-semibold mt-4">Sinopsis</h3>
            <p class="text-md">{{ $libro->sinopsis }}</p>
            <div class="card-actions justify-end">
                <button class="btn btn-primary" onclick="document.getElementById('save-prestamo').showModal()">Préstamo</button>
                <button class="btn btn-primary" onclick="document.getElementById('save-coleccion_libro').showModal()">Añadir a colección</button>
            </div>
        </div>
    </div>

    <dialog id="save-prestamo" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Solicitar Préstamo</h3>
            <form method="POST" action="{{ route('client-libros-prestamo.save', $libro->id) }}">
                @csrf
                <p>¿Deseas solicitar el préstamo de este libro? La fecha de devolución estimada será el <strong>{{ \Carbon\Carbon::now()->addWeeks(2)->format('Y-m-d') }}</strong>.</p>
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
    
    <dialog id="save-coleccion_libro" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Añadir a Colección</h3>
            <form method="POST" action="{{ route('client-colecciones-libro.save', $libro->id) }}">
                @csrf
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Colección</legend>
                    <select class="select" name="coleccion_id" required>
                        <option disabled selected>Selecciona una colección</option>
                        @foreach ($colecciones as $coleccion)
                            <option value="{{ $coleccion->id }}">{{ $coleccion->nombre }}</option>
                        @endforeach
                    </select>
                </fieldset>
                <button type="submit" class="btn btn-neutral">Añadir</button>
            </form>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn">Close</button>
                </form>
            </div>
        </div>
    </dialog>

    <h3 class="text-2xl font-semibold mt-8 mb-4">Reseñas</h3>
    @foreach ($resenas as $resena)

        <div class="card w-96 bg-base-100 card-sm shadow-sm">
            <div class="card-body">
                <h2 class="card-title">{{ $resena->user->name }}</h2>
                <p>{{ $resena->fecha }}</p>
                <p>★ {{ $resena->calificacion }}</p>
                <p>{{ $resena->comentario }}</p>
                 @if ($resena->user_id === auth()->user()->id)
                    <div class="justify-end card-actions">
                        <button class="btn btn-square" onclick="document.getElementById('edit-{{ $resena->id }}').showModal()">
                            <x-eos-edit class="h-6 w-6" />
                        </button>
                        <button class="btn btn-square" onclick="document.getElementById('delete-{{ $resena->id }}').showModal()">
                            <x-eos-delete class="h-6 w-6" />
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <dialog id="edit-{{ $resena->id }}" class="modal">
            <div class="modal-box">
                <h3 class="text-lg font-bold">Editar Reseña</h3>
                <form method="POST" action="{{ route('client-libros-resena.update', $resena->id) }}">
                    @csrf
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Calificación</legend>
                        <input
                            type="number"
                            name="calificacion"
                            value="{{ $resena->calificacion }}"
                            class="input validator"
                            required
                            placeholder="Escribe una calificación del 1 al 5"
                            min="1"
                            max="5"
                            title="Escribe una calificación del 1 al 5"
                        />
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Comentario</legend>
                        <textarea name="comentario" class="textarea h-24" required>{{ $resena->comentario }}</textarea>
                    </fieldset>
                    <button type="submit" class="btn btn-neutral">Guardar</button>
                </form>
                <div class="modal-action">
                    <form method="dialog">
                        <!-- if there is a button in form, it will close the modal -->
                        <button class="btn">Close</button>
                    </form>
                </div>
            </div>
        </dialog>

        <dialog id="delete-{{ $resena->id }}" class="modal">
            <div class="modal-box">
                <h3 class="text-lg font-bold">Eliminar Reseña</h3>
                <form method="POST" action="{{ route('client-libros-resena.delete', $resena->id) }}">
                    @csrf
                    <p>¿Estás seguro de que deseas eliminar esta reseña?</p>
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

    <form method="POST" action="{{ route('client-libros-resena.save', $libro->id) }}">
        @csrf
        <fieldset class="fieldset">
            <legend class="fieldset-legend">Calificación</legend>
            <input
                type="number"
                name="calificacion"
                class="input validator"
                required
                placeholder="Escribe una calificación del 1 al 5"
                min="1"
                max="5"
                title="Escribe una calificación del 1 al 5"
            />
        </fieldset>
        <fieldset class="fieldset">
            <legend class="fieldset-legend">Comentario</legend>
            <textarea name="comentario" class="textarea h-24" required></textarea>
        </fieldset>
        <button type="submit" class="btn btn-neutral">Enviar</button>
    </form>
</x-base>