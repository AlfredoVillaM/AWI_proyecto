<x-base>
    <div class="p-6 bg-gray-50 min-h-screen">
        <div class="text-center mb-8">
            <div class="relative inline-block">
                <h1 class="text-4xl md:text-5xl font-bold font-serif italic text-gray-800 mb-1 text-center">Biblioteca</h1>
                <p class="text-gray-500 text-base font-light tracking-wider mb-1 italic max-w-md mx-auto">Explora nuestro catálogo de libros</p>
                <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gray-300 mx-4 md:mx-8 lg:mx-12"></div>
            </div>
        </div>
        <div class="mb-6 flex justify-center">
            <input id="searchInput" type="text" placeholder="Buscar libro o autor..." class="w-full max-w-md px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-300 outline-none transition-all" />
        </div>
        <p id="noResultsMsg" class="text-center text-gray-500 italic hidden">No se encontraron libros que coincidan.</p>
        <div id="librosGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($libros as $libro)
                <div class="flip-card w-full h-[420px]" data-titulo="{{ strtolower($libro->titulo) }}" data-autor="{{ strtolower($libro->autor) }}">
                    <div class="flip-inner rounded-xl">
                        <div class="flip-front p-4 flex flex-col items-center">
                            <div class="w-full h-72 flex items-center justify-center">
                                <img src="{{ $libro->portada_base64 }}" alt="{{ $libro->titulo }}" class="max-h-72 object-contain" />
                            </div>
                            <h2 class="text-xl font-bold text-gray-800 mt-3 text-center">{{ $libro->titulo }}</h2>
                            <p class="text-sm text-gray-600 text-center -mt-1">{{ $libro->autor }}</p>
                        </div>
                        <div class="flip-back bg-linear-to-br from-purple-50 to-blue-50 p-6 rounded-xl shadow-lg flex flex-col items-center justify-center gap-4">
                            <div class="text-center mb-4">
                                <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $libro->titulo }}</h3>
                                <p class="text-sm text-gray-600 italic mb-1">{{ $libro->autor }}</p>
                                <p class="text-xs text-gray-500">ISBN: {{ $libro->isbn }}</p>
                            </div>
                            <a href="{{ route('client-libros.show', $libro->id) }}" class=" btn btn-md btn-outline btn-primary w-40 flex items-center justify-center gap-2 hover:scale-105 transition-transform duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Ver Detalles
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-base>

<style>
    .flip-card{perspective: 1000px;}
    .flip-inner{position: relative; width: 100%; height: 100%; transition: transform 0.6s; transform-style: preserve-3d;}
    .flip-card:hover .flip-inner{transform: rotateY(180deg);}
    .flip-front, .flip-back{position: absolute; width: 100%; height: 100%; backface-visibility: hidden;}
    .flip-back{transform: rotateY(180deg);}
</style>

<script>
    const searchInput = document.getElementById('searchInput');
    const librosGrid = document.getElementById('librosGrid');
    const noResultsMsg = document.getElementById('noResultsMsg');
    const libros = Array.from(librosGrid.children);

    searchInput.addEventListener('input', () => {
        const query = searchInput.value.toLowerCase();
        let anyVisible = false;
        libros.forEach(libro => {
            const titulo = libro.getAttribute('data-titulo');
            const autor = libro.getAttribute('data-autor');
            if(titulo.includes(query) || autor.includes(query)){
                libro.style.display = '';
                anyVisible = true;
            } else {
                libro.style.display = 'none';
            }
        });
        noResultsMsg.classList.toggle('hidden', anyVisible);
    });
</script>