<x-base>
    <div class="bg-gray-50 p-4 md:p-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-8">
                <div class="relative inline-block">
                    <h1 class="text-4xl md:text-5xl font-bold font-serif italic text-gray-800 mb-1 text-center">Préstamos</h1>
                    <p class="text-gray-500 text-base font-light tracking-wider mb-1 italic max-w-md mx-auto">Gestión de préstamos de libros</p>
                    <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gray-300 mx-4 md:mx-8 lg:mx-12"></div>
                </div>
            </div>
            <div class="flex justify-end mb-8">
                <a href="{{ route('admin-prestamos.pdf') }}" class="cursor-pointer btn btn-outline btn-secondary flex items-center gap-2 transition-all duration-300 hover:shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Descargar
                </a>
            </div>
            <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <thead class="bg-linear-to-r from-purple-100 to-blue-100">
                            <tr>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider border-b border-purple-200">Libro</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider border-b border-purple-200">Usuario</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider border-b border-purple-200">Fecha de Préstamo</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider border-b border-purple-200">Fecha Límite</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider border-b border-purple-200">Fecha de Devolución</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider border-b border-purple-200">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-center">
                            @foreach ($prestamos as $prestamo)
                                <tr class="hover:bg-gray-100/80 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-full bg-linear-to-br from-purple-100 to-blue-100 flex items-center justify-center mr-3">
                                                <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">{{ $prestamo->libro->titulo }}</div>
                                                <div class="text-xs text-gray-500">{{ $prestamo->libro->autor }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-full bg-linear-to-br from-gray-100 to-blue-100 flex items-center justify-center mr-3">
                                                <span class="text-sm font-semibold text-gray-700">{{ substr($prestamo->user->name, 0, 1) }}</span>
                                            </div>
                                            <div class="text-sm text-gray-900">{{ $prestamo->user->name }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 font-medium">{{ $prestamo->fecha_prestamo }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium {{ \Carbon\Carbon::parse($prestamo->fecha_limite)->isPast() && !$prestamo->fecha_devolucion ? 'text-red-600' : 'text-orange-600' }}">
                                            {{ $prestamo->fecha_limite }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($prestamo->fecha_devolucion)
                                            <div class="text-sm font-medium text-green-600">{{ $prestamo->fecha_devolucion }}</div>
                                        @else
                                            <div class="flex items-center">
                                                <div class="w-6 h-6 rounded-full bg-linear-to-br from-orange-50 to-yellow-50 flex items-center justify-center mr-2">
                                                    <svg class="w-3 h-3 text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                    </svg>
                                                </div>
                                                <span class="text-sm text-gray-400 italic">~ Pendiente ~</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="document.getElementById('update-{{ $prestamo->id }}').showModal()" class="btn btn-outline btn-primary flex items-center gap-2 transition-all duration-300 hover:shadow-md"
                                                @if($prestamo->fecha_devolucion) disabled @endif>
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            Marcar devolución
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($prestamos->isEmpty())
                    <div class="text-center py-12">
                        <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-700 mb-2">No hay préstamos registrados</h4>
                        <p class="text-sm text-gray-500">Los préstamos aparecerán aquí cuando sean creados</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @foreach ($prestamos as $prestamo)
    <dialog id="update-{{ $prestamo->id }}" class="modal">
        <div class="modal-box max-w-md p-0 overflow-hidden bg-linear-to-b from-white to-blue-50/30 rounded-2xl shadow-2xl shadow-blue-200/50">
            <div class="border-b border-blue-100/50 bg-linear-to-r from-white to-blue-50/40 p-6 text-center">
                <div class="flex flex-col items-center gap-3">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Marcar Devolución</h3>
                        <p class="text-blue-600/70 text-sm mt-1">Confirmar devolución del libro</p>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('admin-prestamos.update', $prestamo->id) }}" class="p-6" onsubmit="showLoadingSpinner(event, this)">
                @csrf
                <div class="text-center">
                    <p class="text-gray-700 mb-4">
                        ¿Estás seguro de que deseas marcar la devolución del libro 
                        <span class="font-semibold text-blue-700">"{{ $prestamo->libro->titulo }}"</span>?
                    </p>
                    <div class="mb-6 p-3 bg-blue-50/50 border border-blue-100 rounded-lg text-sm text-blue-700/80">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-left">
                                <div class="text-blue-600/80">Usuario:</div>
                                <div class="font-medium text-blue-800">{{ $prestamo->user->name }}</div>
                            </div>
                            <div class="text-right">
                                <div class="text-blue-600/80">Fecha límite:</div>
                                <div class="font-medium {{ \Carbon\Carbon::parse($prestamo->fecha_limite)->isPast() ? 'text-red-600' : 'text-green-600' }}">
                                    {{ $prestamo->fecha_limite }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-6 border-t border-blue-100 flex justify-center gap-3">
                        <button type="button" onclick="document.getElementById('update-{{ $prestamo->id }}').close()" class="cursor-pointer px-5 py-2.5 text-gray-600 bg-white border border-blue-100 rounded-lg font-medium hover:bg-blue-50/50 hover:border-blue-200 transition-all duration-200">
                            Cancelar
                        </button>
                        <button type="submit" class="submit-btn cursor-pointer px-5 py-2.5 bg-linear-to-r from-blue-500 to-blue-600 text-white rounded-lg font-medium hover:from-blue-600 hover:to-blue-700 transition-all duration-200 shadow-sm hover:shadow-md shadow-blue-200 relative">
                            <span class="submit-text">Confirmar Devolución</span>
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