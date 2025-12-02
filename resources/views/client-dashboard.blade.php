<x-base>
    <div class="bg-gray-50 p-4 md:p-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-8">
                <div class="relative inline-block">
                    <h1 class="text-4xl md:text-5xl font-bold font-serif italic text-gray-800 mb-1 text-center">Dashboard</h1>
                    <p class="text-gray-500 text-base font-light tracking-wider mb-1 italic max-w-md mx-auto">Panel de control personal</p>
                    <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gray-300 mx-4 md:mx-8 lg:mx-12"></div>
                </div>
            </div>
            <div class="mb-8">
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 max-w-4xl mx-auto">
                    <div class="flex flex-col items-center gap-4">
                        <div class="w-14 h-14 rounded-full bg-linear-to-br from-yellow-50 to-orange-50 flex items-center justify-center shrink-0">
                            <svg class="w-7 h-7 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <button id="revealFraseBtn" class="cursor-pointer px-6 py-3 bg-yellow-400 text-white font-semibold rounded-xl shadow-lg hover:bg-yellow-500 transition-all">
                            Descubre la frase del día
                        </button>
                        <p id="fraseDelDia" class="text-gray-700 text-lg italic leading-relaxed border-l-4 border-yellow-400 pl-4 py-1 hidden">
                            {{ $fraseDelDia }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-lg p-8 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="mb-2">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-14 h-14 rounded-full bg-linear-to-br from-orange-50 to-yellow-100 flex items-center justify-center">
                                <svg class="w-7 h-7 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800">Préstamos en curso</h3>
                                <p class="text-gray-500 text-sm">Tus préstamos activos pendientes</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-end justify-between">
                        <div class="flex items-baseline gap-2">
                            <div class="text-5xl md:text-6xl font-bold text-orange-500">{{ $prestamosPendientes }}</div>
                            <div class="text-gray-400 text-lg">préstamos</div>
                        </div>
                        <div class="text-right">
                            <div class="text-sm text-gray-400 mb-2">Actividad actual</div>
                            <div class="w-32 h-3 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-linear-to-r from-orange-400 to-orange-500 rounded-full" 
                                     style="width: {{ $prestamosPendientes > 0 ? '100%' : '0%' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 pt-6 border-t border-gray-100">
                        <div class="text-sm text-gray-500 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/>
                            </svg>
                            <span>Préstamos activos</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-gray-100 shadow-lg p-8 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="mb-2">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-14 h-14 rounded-full bg-linear-to-br from-blue-50 to-blue-100 flex items-center justify-center">
                                <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800">Colecciones</h3>
                                <p class="text-gray-500 text-sm">Tus colecciones personales</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-end justify-between">
                        <div class="flex items-baseline gap-2">
                            <div class="text-5xl md:text-6xl font-bold text-blue-600">{{ $totalColecciones }}</div>
                            <div class="text-gray-400 text-lg">colecciones</div>
                        </div>
                        <div class="text-right">
                            <div class="text-sm text-gray-400 mb-2">Organización</div>
                            <div class="w-32 h-3 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-linear-to-r from-blue-500 to-blue-600 rounded-full" 
                                     style="width: {{ $totalColecciones > 0 ? '100%' : '0%' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 pt-6 border-t border-gray-100">
                        <div class="text-sm text-gray-500 flex items-center gap-2">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Libros organizados</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes bounce-in-fwd{
            0% {
                transform: scale(0.5);
                opacity: 0;
            }
            60% {
                transform: scale(1.2);
                opacity: 1;
            }
            100% {
                transform: scale(1);
            }
        }
        .bounce-in-fwd{animation: bounce-in-fwd 1.1s both;}
    </style>

    <script>
        document.getElementById('revealFraseBtn').addEventListener('click', function() {
            const frase = document.getElementById('fraseDelDia');
            frase.classList.remove('hidden');
            frase.classList.add('bounce-in-fwd');
            this.style.display = 'none';
        });
    </script>
</x-base>