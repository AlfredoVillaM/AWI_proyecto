<x-base>
    <div class="p-6 bg-gray-50">
        <div class="text-center mb-4">
            <div class="relative inline-block">
                <h1 class="text-4xl md:text-5xl font-bold font-serif italic text-gray-800 mb-1 text-center">Libros</h1>
                <p class="text-gray-500 text-base font-light tracking-wider mb-1 italic max-w-md mx-auto">Administra el catálogo de libros</p>
                <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gray-300 mx-4 md:mx-8 lg:mx-12"></div>
            </div>
        </div>
        <div class="flex items-center justify-end gap-4 mb-4">
            <button onclick="openModal()" class="btn btn-outline btn-primary flex items-center gap-2 cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span>Añadir Libro</span>
            </button>
            <a href="{{ route('admin-libros.pdf') }}" class="btn btn-outline btn-secondary flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span>Descargar PDF</span>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($libros as $libro)
                <div class="flip-card w-full h-[420px]">
                    <div class="flip-inner rounded-xl">
                        <div class="flip-front p-4 flex flex-col items-center">
                            <div class="w-full h-72 flex items-center justify-center">
                                <img src="{{ $libro->portada_base64 }}" alt="{{ $libro->titulo }}" class="max-h-72 object-contain" />
                            </div>
                            <h2 class="text-xl font-bold text-gray-800 mt-3 text-center">{{ $libro->titulo }}</h2>
                            <p class="text-sm text-gray-600 text-center -mt-1">{{ $libro->autor }}</p>
                        </div>
                        <div class="flip-back bg-violet-100 p-4 rounded-xl shadow-lg flex flex-col items-center justify-center gap-4">
                            <a href="{{ route('admin-libros.show', $libro->id) }}" class="btn btn-md btn-outline btn-primary w-40">Ver detalles</a>
                            <button onclick="document.getElementById('edit-{{ $libro->id }}').showModal()" class="btn btn-md btn-outline w-40">
                                <x-eos-edit class="h-5 w-5" /> Editar
                            </button>
                            <button onclick="document.getElementById('delete-{{ $libro->id }}').showModal()" class="btn btn-md btn-outline btn-error w-40">
                                <x-eos-delete class="h-5 w-5" /> Eliminar
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <dialog id="save_libro" class="modal">
        <div class="modal-box max-w-2xl p-0 overflow-hidden bg-linear-to-b from-white to-purple-50/30 rounded-2xl shadow-2xl shadow-purple-200/50">
            <div class="border-b border-purple-100/50 bg-linear-to-r from-white to-purple-50/40 p-6 text-center">
                <div class="flex flex-col items-center gap-3">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Añadir Nuevo Libro</h3>
                        <p class="text-purple-600/70 text-sm mt-1">Completa los detalles del libro</p>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('admin-libros.save') }}" enctype="multipart/form-data" class="p-4" onsubmit="showLoadingSpinner(event, this)">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700 mb-0.5">ISBN</label>
                        <input name="isbn" type="text" class="w-full px-4 py-2.5 bg-white border border-purple-100 rounded-lg focus:ring-2 focus:ring-purple-300/50 focus:border-purple-300 outline-none transition-all placeholder:text-gray-400" placeholder="Ej: 978-3-16-148410-0" required />
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700 mb-0.5">Título</label>
                        <input name="titulo" type="text" class="w-full px-4 py-2.5 bg-white border border-purple-100 rounded-lg focus:ring-2 focus:ring-purple-300/50 focus:border-purple-300 outline-none transition-all placeholder:text-gray-400" placeholder="Título del libro" required />
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700 mb-0.5">Autor</label>
                        <input name="autor" type="text" class="w-full px-4 py-2.5 bg-white border border-purple-100 rounded-lg focus:ring-2 focus:ring-purple-300/50 focus:border-purple-300 outline-none transition-all placeholder:text-gray-400" placeholder="Nombre del autor" required />
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700 mb-0.5">Editorial</label>
                        <input name="editorial" type="text" class="w-full px-4 py-2.5 bg-white border border-purple-100 rounded-lg focus:ring-2 focus:ring-purple-300/50 focus:border-purple-300 outline-none transition-all placeholder:text-gray-400" placeholder="Nombre de la editorial" required />
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700 mb-0.5">Fecha de publicación</label>
                        <input name="fecha_publicacion" type="date" class="w-full px-4 py-2.5 bg-white border border-purple-100 rounded-lg focus:ring-2 focus:ring-purple-300/50 focus:border-purple-300 outline-none transition-all text-gray-700" required />
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700 mb-0.5">Portada</label>
                        <div class="relative">
                            <input name="portada" type="file" class="w-full px-4 py-2.5 bg-white border border-purple-100 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-linear-to-r file:from-purple-50 file:to-purple-100 file:text-purple-700 hover:file:from-purple-100 hover:file:to-purple-200 outline-none transition-all" accept="image/*" required />
                        </div>
                    </div>
                    <div class="md:col-span-2 space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700 mb-0.5">Sinopsis</label>
                        <textarea name="sinopsis" class="w-full px-4 py-2.5 bg-white border border-purple-100 rounded-lg focus:ring-2 focus:ring-purple-300/50 focus:border-purple-300 outline-none transition-all placeholder:text-gray-400 h-32 resize-none" placeholder="Describe brevemente el contenido del libro..." required></textarea>
                    </div>
                </div>
                <div class="mt-4 pt-6 border-t border-purple-100 flex justify-end gap-3">
                    <button type="button" onclick="modal.close()" class="cursor-pointer px-5 py-2.5 text-gray-600 bg-white border border-purple-100 rounded-lg font-medium hover:bg-purple-50/50 hover:border-purple-200 transition-all duration-200">
                        Cancelar
                    </button>
                    <button type="submit" class="submit-btn cursor-pointer px-5 py-2.5 bg-linear-to-r from-purple-500 to-purple-600 text-white rounded-lg font-medium hover:from-purple-600 hover:to-purple-700 transition-all duration-200 shadow-sm hover:shadow-md shadow-purple-200 relative">
                        <span class="submit-text">Añadir</span>
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
    @foreach ($libros as $libro)
        <dialog id="edit-{{ $libro->id }}" class="modal">
            <div class="modal-box max-w-2xl p-0 overflow-hidden bg-linear-to-b from-white to-blue-50/30 rounded-2xl shadow-2xl shadow-blue-200/50">
                <div class="border-b border-blue-100/50 bg-linear-to-r from-white to-blue-50/40 p-6 text-center">
                    <div class="flex flex-col items-center gap-3">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Editar Libro</h3>
                            <p class="text-blue-600/70 text-sm mt-1">Actualiza la información del libro</p>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin-libros.update', $libro->id) }}" enctype="multipart/form-data" class="p-4" onsubmit="showLoadingSpinner(event, this)">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="space-y-1.5">
                            <label class="block text-sm font-medium text-gray-700 mb-0.5">ISBN</label>
                            <input name="isbn" type="text" value="{{ $libro->isbn }}" class="w-full px-4 py-2.5 bg-white border border-blue-100 rounded-lg focus:ring-2 focus:ring-blue-300/50 focus:border-blue-300 outline-none transition-all placeholder:text-gray-400" placeholder="Ej: 978-3-16-148410-0" required />
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-sm font-medium text-gray-700 mb-0.5">Título</label>
                            <input name="titulo" type="text" value="{{ $libro->titulo }}" class="w-full px-4 py-2.5 bg-white border border-blue-100 rounded-lg focus:ring-2 focus:ring-blue-300/50 focus:border-blue-300 outline-none transition-all placeholder:text-gray-400" placeholder="Título del libro" required />
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-sm font-medium text-gray-700 mb-0.5">Autor</label>
                            <input name="autor" type="text" value="{{ $libro->autor }}" class="w-full px-4 py-2.5 bg-white border border-blue-100 rounded-lg focus:ring-2 focus:ring-blue-300/50 focus:border-blue-300 outline-none transition-all placeholder:text-gray-400" placeholder="Nombre del autor" required />
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-sm font-medium text-gray-700 mb-0.5">Editorial</label>
                            <input name="editorial" type="text" value="{{ $libro->editorial }}" class="w-full px-4 py-2.5 bg-white border border-blue-100 rounded-lg focus:ring-2 focus:ring-blue-300/50 focus:border-blue-300 outline-none transition-all placeholder:text-gray-400" placeholder="Nombre de la editorial" required />
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-sm font-medium text-gray-700 mb-0.5">Fecha de publicación</label>
                            <input name="fecha_publicacion" type="date" value="{{ $libro->fecha_publicacion }}" class="w-full px-4 py-2.5 bg-white border border-blue-100 rounded-lg focus:ring-2 focus:ring-blue-300/50 focus:border-blue-300 outline-none transition-all text-gray-700" required />
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-sm font-medium text-gray-700 mb-0.5">Portada (opcional)</label>
                            <div class="relative">
                                <input name="portada" type="file" class="w-full px-4 py-2.5 bg-white border border-blue-100 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-linear-to-r file:from-blue-50 file:to-blue-100 file:text-blue-700 hover:file:from-blue-100 hover:file:to-blue-200 outline-none transition-all" accept="image/*" />
                            </div>
                            @if($libro->portada_base64)
                                <p class="text-xs text-blue-600 mt-1">Deja vacío para mantener la portada actual</p>
                            @endif
                        </div>
                        <div class="md:col-span-2 space-y-1.5">
                            <label class="block text-sm font-medium text-gray-700 mb-0.5">Sinopsis</label>
                            <textarea name="sinopsis" class="w-full px-4 py-2.5 bg-white border border-blue-100 rounded-lg focus:ring-2 focus:ring-blue-300/50 focus:border-blue-300 outline-none transition-all placeholder:text-gray-400 h-32 resize-none" placeholder="Describe brevemente el contenido del libro..." required>{{ $libro->sinopsis }}</textarea>
                        </div>
                    </div>
                    <div class="mt-1 pt-6 border-t border-blue-100 flex justify-end gap-3">
                        <button type="button" onclick="this.closest('dialog').close()" class="cursor-pointer px-5 py-2.5 text-gray-600 bg-white border border-blue-100 rounded-lg font-medium hover:bg-blue-50/50 hover:border-blue-200 transition-all duration-200">
                            Cancelar
                        </button>
                        <button type="submit" class="submit-btn cursor-pointer px-5 py-2.5 bg-linear-to-r from-blue-500 to-blue-600 text-white rounded-lg font-medium hover:from-blue-600 hover:to-blue-700 transition-all duration-200 shadow-sm hover:shadow-md shadow-blue-200 relative">
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
        <dialog id="delete-{{ $libro->id }}" class="modal">
            <div class="modal-box max-w-md p-0 overflow-hidden bg-linear-to-b from-white to-red-50/30 rounded-2xl shadow-2xl shadow-red-200/50">
                <div class="border-b border-red-100/50 bg-linear-to-r from-white to-red-50/40 p-6 text-center">
                    <div class="flex flex-col items-center gap-3">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Eliminar Libro</h3>
                            <p class="text-red-600/70 text-sm mt-1">Esta acción no se puede deshacer</p>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin-libros.delete', $libro->id) }}" class="p-6" onsubmit="showLoadingSpinner(event, this)">
                    @csrf
                    <div class="text-center">
                        <p class="text-gray-700 mb-4">¿Estás seguro de eliminar el libro <span class="font-semibold text-gray-800">{{ $libro->titulo }}</span> de {{ $libro->autor }}?</p>
                        <div class="mb-6 p-3 bg-red-50/50 border border-red-100 rounded-lg text-sm text-red-700/80">
                            <div class="flex items-center gap-2 justify-center">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C8.14 2 5 5.14 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.86-3.14-7-7-7zm0 2c2.76 0 5 2.24 5 5 0 2.88-2.88 7.19-5 9.88-2.12-2.69-5-7-5-9.88 0-2.76 2.24-5 5-5z"/>
                                </svg>
                                <span>Todos los datos relacionados se perderán permanentemente</span>
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
</x-base>

<script>
    const modal = document.getElementById('save_libro');
    const form  = modal.querySelector('form');
    function openModal() {
        form.reset();
        const fileInput = form.querySelector('input[type="file"]');
        if (fileInput) fileInput.value = "";
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

<style>
    .line-clamp-1{overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 1;}
    .line-clamp-2{overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2;}
    .modal-box{max-height: 90vh; overflow-y: auto;}
    .spinner{width: 20px; height: 20px; border: 3px solid rgba(255, 255, 255, 0.3); border-top: 3px solid #fff; border-radius: 50%; animation: spin 0.8s linear infinite;}
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    .loading-spinner{display: flex; align-items: center; justify-content: center;}
    .hidden{display: none;}
    .submit-btn{position: relative;min-height: 45px;}
    .submit-btn:disabled{opacity: 0.8;cursor: not-allowed;}
    .flip-card{perspective: 1000px;}
    .flip-inner{position: relative; width: 100%; height: 100%; transition: transform 0.6s; transform-style: preserve-3d;}
    .flip-card:hover .flip-inner{transform: rotateY(180deg);}
    .flip-front, .flip-back{position: absolute; width: 100%; height: 100%; backface-visibility: hidden;}
    .flip-back{transform: rotateY(180deg);}
</style>