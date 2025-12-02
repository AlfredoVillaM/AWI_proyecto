<x-base>
    <div class="min-h-screen bg-gray-50 p-2">
        <div class="max-w-7xl mx-auto">
            <div class="mb-2 -ml-1">
                <div class="mb-2 -ml-1 inline-block">
                <a href="{{ route('admin-libros.index') }}" class="btn btn-outline flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Volver al catálogo</span>
                </a>
            </div>
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 mb-8">
                <div class="flex flex-col lg:flex-row">
                    <div class="lg:w-2/5 p-6 bg-linear-to-br from-purple-50/50 to-blue-50/50 flex items-center justify-center">
                        <div class="relative w-full">
                            <img src="{{ $libro->portada_base64 }}" alt="{{ $libro->titulo }}" class="w-full h-auto max-h-[500px] object-contain rounded-lg shadow-xl shadow-purple-200/50" />
                            <div class="absolute inset-0 rounded-lg bg-linear-to-t from-purple-100/10 to-transparent pointer-events-none"></div>
                        </div>
                    </div>
                    <div class="lg:w-3/5 p-6">
                        <div class="mb-2 text-center">
                            <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $libro->titulo }}</h1>
                            <div class="flex items-center justify-center gap-2 text-purple-600 mx-auto">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-base font-medium">{{ $libro->autor }}</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-2">
                            <div class="bg-gray-50/30 rounded-lg p-2 border border-gray-100">
                                <p class="text-xs text-gray-500 mb-1">ISBN</p>
                                <p class="text-base font-mono font-semibold text-gray-800">{{ $libro->isbn }}</p>
                            </div>
                            <div class="bg-gray-50/30 rounded-lg p-2 border border-gray-100">
                                <p class="text-xs text-gray-500 mb-1">Editorial</p>
                                <p class="text-base font-semibold text-gray-800">{{ $libro->editorial }}</p>
                            </div>
                            <div class="bg-gray-50/30 rounded-lg p-2 border border-gray-100">
                                <p class="text-xs text-gray-500 mb-1">Fecha de publicación</p>
                                <p class="text-base font-semibold text-gray-800">{{ \Carbon\Carbon::parse($libro->fecha_publicacion)->format('d/m/Y') }}</p>
                            </div>
                            <div class="bg-gray-50/30 rounded-lg p-2 border border-gray-100">
                                <p class="text-xs text-gray-500 mb-1">Reseñas</p>
                                <p class="text-base font-semibold text-gray-800">{{ $resenas->count() }}</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="flex items-center gap-2 mb-3">
                                <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <h2 class="text-xl font-bold text-gray-800">Sinopsis</h2>
                            </div>
                            <div class="bg-gray-50/20 rounded-lg p-4 border border-gray-100">
                                <p class="text-gray-700 leading-relaxed text-base">{{ $libro->sinopsis }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 rounded-full bg-linear-to-r from-purple-100 to-blue-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Reseñas</h3>
                            <p class="text-sm text-gray-500">{{ $resenas->count() }} reseña(s)</p>
                        </div>
                    </div>
                </div>
                @if($resenas->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($resenas as $resena)
                            <div class="group bg-white rounded-lg border border-gray-200 p-4 hover:shadow-lg hover:border-purple-200 transition-all duration-300">
                                <div class="flex items-start justify-between mb-3">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-linear-to-r from-purple-100 to-blue-100 flex items-center justify-center">
                                            <span class="text-sm font-semibold text-purple-700">{{ substr($resena->user->name, 0, 1) }}</span>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-bold text-gray-800">{{ $resena->user->name }}</h4>
                                            <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($resena->fecha)->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-1 bg-yellow-50 px-2 py-1 rounded-full">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $resena->calificacion)
                                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            @else
                                                <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            @endif
                                        @endfor
                                        <span class="ml-1 text-sm font-bold text-yellow-600">{{ $resena->calificacion }}/5</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <p class="text-sm text-gray-700 leading-relaxed">{{ $resena->comentario }}</p>
                                </div>
                                <div class="flex justify-end">
                                    <button onclick="document.getElementById('delete-{{ $resena->id }}').showModal()" 
                                            class="btn btn-xs btn-square btn-outline btn-error opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <x-eos-delete class="h-3 w-3" />
                                    </button>
                                </div>
                            </div>
                            <dialog id="delete-{{ $resena->id }}" class="modal">
                                <div class="modal-box max-w-md p-0 overflow-hidden bg-linear-to-b from-white to-red-50/30 rounded-2xl shadow-2xl shadow-red-200/50">
                                    <div class="border-b border-red-100/50 bg-linear-to-r from-white to-red-50/40 p-6 text-center">
                                        <div class="flex flex-col items-center gap-3">
                                            <div>
                                                <h3 class="text-xl font-semibold text-gray-800">Eliminar Reseña</h3>
                                                <p class="text-red-600/70 text-sm mt-1">Esta acción no se puede deshacer</p>
                                            </div>
                                        </div>
                                    </div>
                                    <form method="POST" action="{{ route('admin-libros-resena.delete', $resena->id) }}" class="p-6" onsubmit="showLoadingSpinner(event, this)">
                                        @csrf
                                        <div class="text-center">
                                            <p class="text-gray-700 mb-4">¿Estás seguro de eliminar la reseña de <span class="font-semibold text-gray-800">{{ $resena->user->name }}</span>?</p>
                                            <div class="mb-6 p-3 bg-red-50/50 border border-red-100 rounded-lg text-sm text-red-700/80">
                                                <div class="flex items-center gap-2 justify-center">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M12 2C8.14 2 5 5.14 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.86-3.14-7-7-7zm0 2c2.76 0 5 2.24 5 5 0 2.88-2.88 7.19-5 9.88-2.12-2.69-5-7-5-9.88 0-2.76 2.24-5 5-5z"/>
                                                    </svg>
                                                    <span>La reseña se perderá permanentemente</span>
                                                </div>
                                            </div>
                                            <div class="pt-6 border-t border-red-100 flex justify-center gap-3">
                                                <button type="button" onclick="this.closest('dialog').close()" class="cursor-pointer px-5 py-2.5 text-gray-600 bg-white border border-red-100 rounded-lg font-medium hover:bg-red-50/50 hover:border-red-200 transition-all duration-200">
                                                    Cancelar
                                                </button>
                                                <button type="submit" class="submit-btn cursor-pointer px-5 py-2.5 bg-linear-to-r from-red-500 to-red-600 text-white rounded-lg font-medium hover:from-red-600 hover:to-red-700 transition-all duration-200 shadow-sm hover:shadow-md shadow-red-200 relative">
                                                    <span class="submit-text">Eliminar</span>
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
                @else
                    <div class="text-center py-10 bg-white rounded-xl border border-gray-200">
                        <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-3">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-700 mb-2">No hay reseñas todavía</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-base>

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