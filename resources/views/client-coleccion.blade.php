<x-base>
    <a href="{{ route('client-colecciones.index') }}" class="btn btn-secondary mt-6">Volver</a>
    
    <h1 class="text-5xl font-bold">{{ $coleccion->nombre }}</h1>

    @foreach ($libros as $libro)
        <div class="card bg-base-100 w-96 shadow-sm">
            <figure>
                <img src="{{ $libro->portada_base64 }}" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">{{ $libro->titulo }}</h2>
                <p>{{ $libro->autor }}</p>
                <div class="card-actions justify-end">
                    <button class="btn btn-square" onclick="document.getElementById('delete-{{ $libro->id }}').showModal()">
                        <x-eos-delete class="h-6 w-6" />
                    </button>
                </div>
            </div>
        </div>

        <dialog id="delete-{{ $libro->id }}" class="modal">
            <div class="modal-box">
                <h3 class="text-lg font-bold">Eliminar Libro</h3>
                <form method="POST" action="{{ route('client-colecciones-libro.delete', [$coleccion->id, $libro->id]) }}">
                    @csrf
                    <p>¿Estás seguro de que deseas eliminar el libro "{{ $libro->titulo }}" de la colección?</p>
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
