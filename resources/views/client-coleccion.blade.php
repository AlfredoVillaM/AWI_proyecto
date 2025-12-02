<x-base>
    <div class="bg-gray-50 p-4 md:p-6">
        <div class="max-w-7xl mx-auto">
            <div class="mb-2 -ml-1 inline-block">
                <a href="{{ route('client-colecciones.index') }}" class="btn btn-outline flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Volver a Colecciones</span>
                </a>
            </div>
            <div class="text-center mb-8">
                <div class="relative inline-block">
                    <h1 class="text-4xl md:text-5xl font-bold font-serif italic text-gray-800 mb-1 text-center">{{ $coleccion->nombre }}</h1>
                    <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gray-300 mx-4 md:mx-8 lg:mx-12"></div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($libros as $libro)
                    <div class="relative group overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500">
                        <div class="relative h-72 overflow-hidden">
                            <img src="{{ $libro->portada_base64 }}" alt="{{ $libro->titulo }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                            <div class="absolute inset-0 bg-linear-to-t from-black/80 via-black/40 to-transparent"></div>
                            <div class="absolute inset-0 p-6 flex flex-col justify-end">
                                <h2 class="text-xl font-bold text-white mb-2 line-clamp-1">{{ $libro->titulo }}</h2>
                                <div class="flex items-center gap-2 text-white/90 mb-4">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-sm">{{ $libro->autor }}</span>
                                </div>
                                <div class="opacity-0 transform translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
                                    <button onclick="document.getElementById('delete-{{ $libro->id }}').showModal()" class="w-full btn btn-error btn-outline flex items-center justify-center gap-2 transition-all duration-300 hover:shadow-lg bg-white/10 backdrop-blur-sm border-white/30 text-white hover:bg-white/20">
                                        <x-eos-delete class="h-4 w-4" />
                                        Eliminar de la colección
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="absolute inset-0 border-2 border-transparent group-hover:border-white/20 rounded-2xl transition-all duration-500 pointer-events-none"></div>
                    </div>
                    <dialog id="delete-{{ $libro->id }}" class="modal">
                        <div class="modal-box max-w-md p-0 overflow-hidden bg-linear-to-b from-white to-red-50/30 rounded-2xl shadow-2xl shadow-red-200/50">
                            <div class="border-b border-red-100/50 bg-linear-to-r from-white to-red-50/40 p-6 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div>
                                        <h3 class="text-xl font-semibold text-gray-800">Eliminar Libro</h3>
                                        <p class="text-red-600/70 text-sm mt-1">Remover de la colección</p>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('client-colecciones-libro.delete', [$coleccion->id, $libro->id]) }}" class="p-6" onsubmit="showLoadingSpinner(event, this)">
                                @csrf
                                <div class="text-center">
                                    <p class="text-gray-700 mb-4">
                                        ¿Estás seguro de que deseas eliminar el libro 
                                        <span class="font-semibold text-red-700">"{{ $libro->titulo }}"</span> 
                                        de la colección?
                                    </p>
                                    <div class="mb-6 p-3 bg-red-50/50 border border-red-100 rounded-lg">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-12 rounded overflow-hidden bg-gray-100">
                                                <img src="{{ $libro->portada_base64 }}" alt="{{ $libro->titulo }}" class="w-full h-full object-cover" />
                                            </div>
                                            <div class="text-left">
                                                <div class="text-sm font-medium text-gray-800">{{ $libro->titulo }}</div>
                                                <div class="text-xs text-gray-500">{{ $libro->autor }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-6 border-t border-red-100 flex justify-center gap-3">
                                        <button type="button" onclick="this.closest('dialog').close()" class="cursor-pointer px-5 py-2.5 text-gray-600 bg-white border border-red-100 rounded-lg font-medium hover:bg-red-50/50 hover:border-red-200 transition-all duration-200">
                                            Cancelar
                                        </button>
                                        <button type="submit" class="submit-btn cursor-pointer px-5 py-2.5 bg-linear-to-r from-red-500 to-red-600 text-white rounded-lg font-medium hover:from-red-600 hover:to-red-700 transition-all duration-200 shadow-sm hover:shadow-md shadow-red-200 relative">
                                            <span class="submit-text">Eliminar de la Colección</span>
                                            <div class="loading-spinner hidden absolute inset-0 flex items-center justify-center">
                                                <div class="spinner"></div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <form method="dialog" class="modal-backdrop bg-black/20 backdrop-blur-sm">
                            <button>close</button>
                        </form>
                    </dialog>
                @endforeach
            </div>
            @if($libros->isEmpty())
                <div class="text-center py-12 bg-white rounded-2xl border border-gray-200 mt-8">
                    <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-700 mb-2">Esta colección está vacía</h4>
                    <p class="text-sm text-gray-500">Añade libros desde el catálogo para verlos aquí</p>
                </div>
            @endif
        </div>
    </div>

    <style>
        .spinner{width: 20px; height: 20px; border: 3px solid rgba(255, 255, 255, 0.3); border-top: 3px solid #fff; border-radius: 50%; animation: spin 0.8s linear infinite;}
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .loading-spinner{display: flex; align-items: center; justify-content: center;}
        .hidden{display: none;}
        .submit-btn{position: relative; min-height: 45px;}
        .submit-btn:disabled{opacity: 0.8; cursor: not-allowed;}
        .line-clamp-1 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
        }
    </style>

    <script>
        function showLoadingSpinner(event, formElement) {
            event.preventDefault();
            const submitBtn = formElement.querySelector('.submit-btn');
            const submitText = submitBtn.querySelector('.submit-text');
            const loadingSpinner = submitBtn.querySelector('.loading-spinner');
            if (submitText) submitText.classList.add('hidden');
            if (loadingSpinner) loadingSpinner.classList.remove('hidden');
            submitBtn.disabled = true;
            setTimeout(() => {
                formElement.submit();
            }, 50);
        }
    </script>
</x-base>