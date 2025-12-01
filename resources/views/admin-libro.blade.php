<x-base>
    <a href="{{ route('admin-libros.index') }}" class="btn btn-secondary mt-6">Volver</a>

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
            <button class="btn btn-primary">Listen</button>
            </div>
        </div>
    </div>

    <h3 class="text-2xl font-semibold mt-8 mb-4">Reseñas</h3>
    @foreach ($resenas as $resena)

        <div class="card w-96 bg-base-100 card-sm shadow-sm">
            <div class="card-body">
                <h2 class="card-title">{{ $resena->user->name }}</h2>
                <p>{{ $resena->fecha }}</p>
                <p>★ {{ $resena->calificacion }}</p>
                <p>{{ $resena->comentario }}</p>
                <div class="justify-end card-actions">
                    <button class="btn btn-square" onclick="document.getElementById('delete-{{ $resena->id }}').showModal()">
                        <x-eos-delete class="h-6 w-6" />
                    </button>
                </div>
            </div>
        </div>

        <dialog id="delete-{{ $resena->id }}" class="modal">
            <div class="modal-box">
                <h3 class="text-lg font-bold">Eliminar Reseña</h3>
                <form method="POST" action="{{ route('admin-libros-resena.delete', $resena->id) }}">
                    @csrf
                    <p>¿Estás seguro de que deseas eliminar esta reseña?</p>
                    <button type="submit" class="btn btn-neutral">Eliminar</button>
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
</x-base>