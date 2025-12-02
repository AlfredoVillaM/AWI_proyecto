<x-base>
    <div class="bg-gray-50 p-4 md:p-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-8">
                <div class="relative inline-block">
                    <h1 class="text-4xl md:text-5xl font-bold font-serif italic text-gray-800 mb-1 text-center">Mis Préstamos</h1>
                    <p class="text-gray-500 text-base font-light tracking-wider mb-1 italic max-w-md mx-auto">Historial de tus préstamos personales</p>
                    <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gray-300 mx-4 md:mx-8 lg:mx-12"></div>
                </div>
            </div>
            <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <thead class="bg-linear-to-r from-blue-100 to-indigo-100">
                            <tr>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider border-b border-blue-200">Libro</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider border-b border-blue-200">Fecha de Préstamo</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider border-b border-blue-200">Fecha Límite</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider border-b border-blue-200">Fecha de Devolución</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-center">
                            @foreach ($prestamos as $prestamo)
                                <tr class="hover:bg-gray-100/80 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            <div class="w-10 h-10 rounded-full bg-linear-to-br from-blue-100 to-indigo-100 flex items-center justify-center mr-3">
                                                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                                                </svg>
                                            </div>
                                            <div class="text-left">
                                                <div class="text-sm font-medium text-gray-900">{{ $prestamo->libro->titulo }}</div>
                                                <div class="text-xs text-gray-500">{{ $prestamo->libro->autor }}</div>
                                            </div>
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
                                            <div class="flex flex-col items-center">
                                                <div class="w-8 h-8 rounded-full bg-linear-to-br from-green-100 to-emerald-100 flex items-center justify-center mb-1">
                                                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                    </svg>
                                                </div>
                                                <div class="text-sm font-medium text-green-600">{{ $prestamo->fecha_devolucion }}</div>
                                            </div>
                                        @else
                                            <div class="flex flex-col items-center">
                                                <div class="w-8 h-8 rounded-full bg-linear-to-br from-orange-50 to-yellow-100 flex items-center justify-center mb-1">
                                                    <svg class="w-4 h-4 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                    </svg>
                                                </div>
                                                <div class="flex items-center">
                                                    <span class="text-sm text-gray-400 italic">~ Pendiente ~</span>
                                                </div>
                                            </div>
                                        @endif
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
                        <h4 class="text-lg font-semibold text-gray-700 mb-2">No tienes préstamos registrados</h4>
                        <p class="text-sm text-gray-500">Tus préstamos aparecerán aquí cuando solicites libros</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-base>