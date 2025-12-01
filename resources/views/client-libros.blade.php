<x-base>
    <h1 class="text-5xl font-bold">Libros</h1>

    @foreach ($libros as $libro)
        <div class="card bg-base-100 w-96 shadow-sm">
            <figure>
                <img src="{{ $libro->portada_base64 }}" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">{{ $libro->titulo }}</h2>
                <p>{{ $libro->autor }}</p>
                <div class="card-actions justify-end">
                    <a href="{{ route('client-libros.show', $libro->id) }}" class="btn">
                        Ver detalles
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</x-base>
