<x-base>
    <h1 class="text-5xl font-bold">Libros</h1>
    
    <!-- Open the modal using ID.showModal() method -->
    <button class="btn" onclick="openModal()">Añadir</button>
    <a href="{{ route('admin-libros.pdf') }}" class="btn btn-primary">Descargar</a>

    <dialog id="save_libro" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Añadir Libro</h3>
            <form method="POST" action="{{ route('admin-libros.save') }}" enctype="multipart/form-data">
                @csrf
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">ISBN</legend>
                    <input name="isbn" type="text" class="input" required />
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Título</legend>
                    <input name="titulo" type="text" class="input" required />
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Autor</legend>
                    <input name="autor" type="text" class="input" required />
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Editorial</legend>
                    <input name="editorial" type="text" class="input" required />
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Fecha de publicación</legend>
                    <input name="fecha_publicacion" type="date" class="input" required />
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Sinopsis</legend>
                    <textarea name="sinopsis" class="textarea h-24" required></textarea>
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Portada</legend>
                    <input name="portada" type="file" class="file-input" required />
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

    @foreach ($libros as $libro)
        <div class="card bg-base-100 w-96 shadow-sm">
            <figure>
                <img src="{{ $libro->portada_base64 }}" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">{{ $libro->titulo }}</h2>
                <p>{{ $libro->autor }}</p>
                <div class="card-actions justify-end">
                    <button class="btn btn-square" onclick="document.getElementById('edit-{{ $libro->id }}').showModal()">
                        <x-eos-edit class="h-6 w-6" />
                    </button>
                    <button class="btn btn-square" onclick="document.getElementById('delete-{{ $libro->id }}').showModal()">
                        <x-eos-delete class="h-6 w-6" />
                    </button>
                    <a href="{{ route('admin-libros.show', $libro->id) }}" class="btn">
                        Ver detalles
                    </a>
                </div>
            </div>
        </div>

        <dialog id="edit-{{ $libro->id }}" class="modal">
            <div class="modal-box">
                <h3 class="text-lg font-bold">Editar Libro</h3>
                <form method="POST" action="{{ route('admin-libros.update', $libro->id) }}" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">ISBN</legend>
                        <input name="isbn" type="text" class="input" value="{{ $libro->isbn }}" required />
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Título</legend>
                        <input name="titulo" type="text" class="input" value="{{ $libro->titulo }}" required />
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Autor</legend>
                        <input name="autor" type="text" class="input" value="{{ $libro->autor }}" required />
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Editorial</legend>
                        <input name="editorial" type="text" class="input" value="{{ $libro->editorial }}" required />
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Fecha de publicación</legend>
                        <input name="fecha_publicacion" type="date" class="input" value="{{ $libro->fecha_publicacion }}" required />
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Sinopsis</legend>
                        <textarea name="sinopsis" class="textarea h-24" required>{{ $libro->sinopsis }}</textarea>
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Portada</legend>
                        <input name="portada" type="file" class="file-input" />
                    </fieldset>
                    <button type="submit" class="btn btn-neutral">Guardar cambios</button>
                </form>
                <div class="modal-action">
                    <form method="dialog">
                        <!-- if there is a button in form, it will close the modal -->
                        <button class="btn">Close</button>
                    </form>
                </div>
            </div>
        </dialog>

        <dialog id="delete-{{ $libro->id }}" class="modal">
            <div class="modal-box">
                <h3 class="text-lg font-bold">Eliminar Libro</h3>
                <form method="POST" action="{{ route('admin-libros.delete', $libro->id) }}">
                    @csrf
                    <p>¿Estás seguro de que deseas eliminar el libro "{{ $libro->titulo }}"?</p>
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

<script>
    const modal = document.getElementById('save_libro');
    const form  = modal.querySelector('form');

    function openModal() {
        // Limpia todos los inputs
        form.reset();

        // Limpia el input file manualmente
        const fileInput = form.querySelector('input[type="file"]');
        if (fileInput) fileInput.value = "";

        // Abre el modal
        modal.showModal();
    }
</script>
