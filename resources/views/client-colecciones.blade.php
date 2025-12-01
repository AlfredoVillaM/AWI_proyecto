<x-base>
    <h1 class="text-5xl font-bold">Mis Colecciones</h1>
    
    <!-- Open the modal using ID.showModal() method -->
    <button class="btn" onclick="openModal()">Nueva</button>

    <dialog id="save_coleccion" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Nueva Colección</h3>
            <form method="POST" action="{{ route('client-colecciones.save') }}">
                @csrf
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Nombre</legend>
                    <input name="nombre" type="text" class="input" required />
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

    @foreach ($colecciones as $coleccion)
        <div class="card bg-base-100 w-96 shadow-sm">
            <div class="card-body">
                <h2 class="card-title">{{ $coleccion->nombre }}</h2>
                <div class="card-actions justify-end">
                    <button class="btn btn-square" onclick="document.getElementById('edit-{{ $coleccion->id }}').showModal()">
                        <x-eos-edit class="h-6 w-6" />
                    </button>
                    <button class="btn btn-square" onclick="document.getElementById('delete-{{ $coleccion->id }}').showModal()">
                        <x-eos-delete class="h-6 w-6" />
                    </button>
                    <a href="{{ route('client-colecciones.show', $coleccion->id) }}" class="btn">
                        Ver
                    </a>
                </div>
            </div>
        </div>

        <dialog id="edit-{{ $coleccion->id }}" class="modal">
            <div class="modal-box">
                <h3 class="text-lg font-bold">Editar Colección</h3>
                <form method="POST" action="{{ route('client-colecciones.update', $coleccion->id) }}" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Nombre</legend>
                        <input name="nombre" type="text" class="input" value="{{ $coleccion->nombre }}" required />
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

        <dialog id="delete-{{ $coleccion->id }}" class="modal">
            <div class="modal-box">
                <h3 class="text-lg font-bold">Eliminar Colección</h3>
                <form method="POST" action="{{ route('client-colecciones.delete', $coleccion->id) }}">
                    @csrf
                    <p>¿Estás seguro de que deseas eliminar la colección "{{ $coleccion->nombre }}"?</p>
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
    const modal = document.getElementById('save_coleccion');
    const form  = modal.querySelector('form');

    function openModal() {
        // Limpia todos los inputs
        form.reset();

        // Abre el modal
        modal.showModal();
    }
</script>
