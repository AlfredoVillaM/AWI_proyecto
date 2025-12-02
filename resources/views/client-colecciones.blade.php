<x-base>
    <div class="bg-gray-50 p-4 md:p-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-8">
                <div class="relative inline-block">
                    <h1 class="text-4xl md:text-5xl font-bold font-serif italic text-gray-800 mb-1 text-center">Mis Colecciones</h1>
                    <p class="text-gray-500 text-base font-light tracking-wider mb-1 italic max-w-md mx-auto">Gestiona tus colecciones personales</p>
                    <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gray-300 mx-4 md:mx-8 lg:mx-12"></div>
                </div>
            </div>
            <div class="flex justify-end mb-8">
                <button onclick="openModal()" class="cursor-pointer btn btn-outline btn-primary flex items-center gap-2 transition-all duration-300 hover:shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Nueva Colección
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($colecciones as $coleccion)
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-lg p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-full bg-linear-to-br from-blue-50 to-indigo-100 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <h2 class="text-xl font-bold text-gray-800">{{ $coleccion->nombre }}</h2>
                            </div>
                        </div>
                        <div class="flex items-center justify-end gap-2 mt-6 pt-6 border-t border-gray-100">
                            <button onclick="document.getElementById('edit-{{ $coleccion->id }}').showModal()" class="btn btn-outline btn-square btn-primary">
                                <x-eos-edit class="h-4 w-4" />
                            </button>
                            <button onclick="document.getElementById('delete-{{ $coleccion->id }}').showModal()" class="btn btn-outline btn-square btn-error">
                                <x-eos-delete class="h-4 w-4" />
                            </button>
                            <a href="{{ route('client-colecciones.show', $coleccion->id) }}" class="btn btn-soft btn-secondary flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Ver
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            @if($colecciones->isEmpty())
                <div class="text-center py-12 bg-white rounded-2xl border border-gray-200">
                    <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-700 mb-2">No tienes colecciones creadas</h4>
                    <p class="text-sm text-gray-500">Crea tu primera colección para organizar tus libros favoritos</p>
                </div>
            @endif
        </div>
    </div>
    <dialog id="save_coleccion" class="modal">
        <div class="modal-box max-w-md p-0 overflow-hidden bg-linear-to-b from-white to-blue-50/30 rounded-2xl shadow-2xl shadow-blue-200/50">
            <div class="border-b border-blue-100/50 bg-linear-to-r from-white to-blue-50/40 p-6 text-center">
                <div class="flex flex-col items-center gap-3">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Nueva Colección</h3>
                        <p class="text-blue-600/70 text-sm mt-1">Crea una nueva colección personal</p>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('client-colecciones.save') }}" class="p-6" onsubmit="showLoadingSpinner(event, this)">
                @csrf
                <div class="space-y-4">
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700 mb-0.5">Nombre de la colección</label>
                        <input name="nombre" type="text" class="w-full px-4 py-2.5 bg-white border border-blue-100 rounded-lg focus:ring-2 focus:ring-blue-300/50 focus:border-blue-300 outline-none transition-all placeholder:text-gray-400" placeholder="Ej: Mis Favoritos, Para Leer, etc." required />
                    </div>
                </div>
                <div class="mt-6 pt-6 border-t border-blue-100 flex justify-center gap-3">
                    <button type="button" onclick="this.closest('dialog').close()" class="cursor-pointer px-5 py-2.5 text-gray-600 bg-white border border-blue-100 rounded-lg font-medium hover:bg-blue-50/50 hover:border-blue-200 transition-all duration-200">
                        Cancelar
                    </button>
                    <button type="submit" class="submit-btn cursor-pointer px-5 py-2.5 bg-linear-to-r from-blue-500 to-blue-600 text-white rounded-lg font-medium hover:from-blue-600 hover:to-blue-700 transition-all duration-200 shadow-sm hover:shadow-md shadow-blue-200 relative">
                        <span class="submit-text">Crear Colección</span>
                        <div class="loading-spinner hidden absolute inset-0 flex items-center justify-center">
                            <div class="spinner"></div>
                        </div>
                    </button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop bg-black/20 backdrop-blur-sm">
            <button>close</button>
        </form>
    </dialog>
    @foreach ($colecciones as $coleccion)
        <dialog id="edit-{{ $coleccion->id }}" class="modal">
            <div class="modal-box max-w-md p-0 overflow-hidden bg-linear-to-b from-white to-purple-50/30 rounded-2xl shadow-2xl shadow-purple-200/50">
                <div class="border-b border-purple-100/50 bg-linear-to-r from-white to-purple-50/40 p-6 text-center">
                    <div class="flex flex-col items-center gap-3">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Editar Colección</h3>
                            <p class="text-purple-600/70 text-sm mt-1">Actualiza el nombre de tu colección</p>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('client-colecciones.update', $coleccion->id) }}" enctype="multipart/form-data" class="p-6" onsubmit="showLoadingSpinner(event, this)">
                    @csrf
                    <div class="space-y-4">
                        <div class="space-y-1.5">
                            <label class="block text-sm font-medium text-gray-700 mb-0.5">Nombre de la colección</label>
                            <input name="nombre" type="text" value="{{ $coleccion->nombre }}" class="w-full px-4 py-2.5 bg-white border border-purple-100 rounded-lg focus:ring-2 focus:ring-purple-300/50 focus:border-purple-300 outline-none transition-all" required />
                        </div>
                    </div>
                    <div class="mt-6 pt-6 border-t border-purple-100 flex justify-center gap-3">
                        <button type="button" onclick="this.closest('dialog').close()" class="cursor-pointer px-5 py-2.5 text-gray-600 bg-white border border-purple-100 rounded-lg font-medium hover:bg-purple-50/50 hover:border-purple-200 transition-all duration-200">
                            Cancelar
                        </button>
                        <button type="submit" class="submit-btn cursor-pointer px-5 py-2.5 bg-linear-to-r from-purple-500 to-purple-600 text-white rounded-lg font-medium hover:from-purple-600 hover:to-purple-700 transition-all duration-200 shadow-sm hover:shadow-md shadow-purple-200 relative">
                            <span class="submit-text">Guardar Cambios</span>
                            <div class="loading-spinner hidden absolute inset-0 flex items-center justify-center">
                                <div class="spinner"></div>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
            <form method="dialog" class="modal-backdrop bg-black/20 backdrop-blur-sm">
                <button>close</button>
            </form>
        </dialog>
        <dialog id="delete-{{ $coleccion->id }}" class="modal">
            <div class="modal-box max-w-md p-0 overflow-hidden bg-linear-to-b from-white to-red-50/30 rounded-2xl shadow-2xl shadow-red-200/50">
                <div class="border-b border-red-100/50 bg-linear-to-r from-white to-red-50/40 p-6 text-center">
                    <div class="flex flex-col items-center gap-3">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Eliminar Colección</h3>
                            <p class="text-red-600/70 text-sm mt-1">Esta acción no se puede deshacer</p>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('client-colecciones.delete', $coleccion->id) }}" class="p-6" onsubmit="showLoadingSpinner(event, this)">
                    @csrf
                    <div class="text-center">
                        <p class="text-gray-700 mb-4">¿Estás seguro de eliminar la colección <span class="font-semibold text-red-700">"{{ $coleccion->nombre }}"</span>?</p>
                        <div class="mb-6 p-3 bg-red-50/50 border border-red-100 rounded-lg text-sm text-red-700/80">
                            <div class="flex items-center gap-2 justify-center">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C8.14 2 5 5.14 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.86-3.14-7-7-7zm0 2c2.76 0 5 2.24 5 5 0 2.88-2.88 7.19-5 9.88-2.12-2.69-5-7-5-9.88 0-2.76 2.24-5 5-5z"/>
                                </svg>
                                <span>Todos los libros de esta colección se eliminarán</span>
                            </div>
                        </div>
                        <div class="pt-6 border-t border-red-100 flex justify-center gap-3">
                            <button type="button" onclick="this.closest('dialog').close()" class="cursor-pointer px-5 py-2.5 text-gray-600 bg-white border border-red-100 rounded-lg font-medium hover:bg-red-50/50 hover:border-red-200 transition-all duration-200">
                                Cancelar
                            </button>
                            <button type="submit" class="submit-btn cursor-pointer px-5 py-2.5 bg-linear-to-r from-red-500 to-red-600 text-white rounded-lg font-medium hover:from-red-600 hover:to-red-700 transition-all duration-200 shadow-sm hover:shadow-md shadow-red-200 relative">
                                <span class="submit-text">Eliminar Colección</span>
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
        const modal = document.getElementById('save_coleccion');
        const form  = modal.querySelector('form');

        function openModal() {
            form.reset();
            modal.showModal();
        }
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