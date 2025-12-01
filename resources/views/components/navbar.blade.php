<div class="navbar bg-[linear-gradient(to_right,oklch(.91_0.057_293.283),oklch(.94_0.029_294.588),oklch(.91_0.057_293.283))] border-b border-[oklch(0.811_0.111_293.571/0.3)] backdrop-blur-lg shadow-sm">
  <div class="navbar-start">
    <a class="flex items-center gap-2 sm:gap-3 px-2 sm:px-4 py-2 rounded-2xl">
      <div class="p-1.5 sm:p-2 rounded-xl bg-gradient-to-r from-purple-600 to-blue-600 shadow-md transition-transform duration-300 hover:scale-105">
        <svg class="w-5 h-5 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
        </svg>
      </div>
      <span class="text-lg sm:text-2xl font-bold bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">Biblioteca</span>
    </a>
  </div>
  <div class="navbar-center flex">
    <ul class="menu menu-horizontal p-0 space-x-0.5 sm:space-x-1">
      @if(auth()->user()->role === 'admin')
        <li>
          <a href="{{ route('admin-dashboard') }}" 
             class="px-2 sm:px-3 md:px-4 py-1.5 sm:py-2.5 rounded-xl font-medium transition-all duration-300 hover:bg-gradient-to-r hover:from-purple-50 hover:to-blue-50 hover:text-purple-700 group relative {{ request()->routeIs('admin-dashboard') ? 'bg-gradient-to-r from-purple-600 to-blue-600 text-white shadow-md' : 'text-gray-700' }}">
            <div class="flex items-center gap-1 sm:gap-2">
              <svg class="w-4 h-4 sm:w-5 sm:h-5 {{ request()->routeIs('admin-dashboard') ? 'text-gray-900' : 'text-gray-500 group-hover:text-purple-600' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
              </svg>
              <span class="text-xs sm:text-sm md:text-base">Dashboard</span>
            </div>
            @if(request()->routeIs('admin-dashboard'))
              <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-4 sm:w-6 md:w-8 h-0.5 bg-gradient-to-r from-purple-600 to-blue-600 rounded-full shadow-sm"></div>
            @else
              <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-0 group-hover:w-4 sm:group-hover:w-6 md:group-hover:w-8 h-0.5 bg-gradient-to-r from-purple-600 to-blue-600 transition-all duration-300 rounded-full"></div>
            @endif
          </a>
        </li>
        <li>
          <a href='{{ route('admin-libros.index') }}' 
             class="px-2 sm:px-3 md:px-4 py-1.5 sm:py-2.5 rounded-xl font-medium transition-all duration-300 hover:bg-gradient-to-r hover:from-emerald-50/80 hover:to-teal-50/80 hover:text-emerald-700 group relative {{ request()->routeIs('admin-libros.*') ? 'bg-gradient-to-r from-emerald-500 to-teal-500 text-white shadow-md shadow-emerald-200/50' : 'text-gray-700' }}">
            <div class="flex items-center gap-1 sm:gap-2">
              <svg class="w-4 h-4 sm:w-5 sm:h-5 {{ request()->routeIs('admin-libros.*') ? 'text-gray-900' : 'text-gray-500 group-hover:text-emerald-600' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
              </svg>
              <span class="text-xs sm:text-sm md:text-base">Libros</span>
            </div>
            @if(request()->routeIs('admin-libros.*'))
              <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-4 sm:w-6 md:w-8 h-0.5 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full shadow-sm"></div>
            @else
              <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-0 group-hover:w-4 sm:group-hover:w-6 md:group-hover:w-8 h-0.5 bg-gradient-to-r from-emerald-500 to-teal-500 transition-all duration-300 rounded-full"></div>
            @endif
          </a>
        </li>
        <li>
          <a href='{{ route('admin-prestamos.index') }}' 
             class="px-2 sm:px-3 md:px-4 py-1.5 sm:py-2.5 rounded-xl font-medium transition-all duration-300 hover:bg-gradient-to-r hover:from-amber-50/80 hover:to-orange-50/80 hover:text-amber-700 group relative {{ request()->routeIs('admin-prestamos.*') ? 'bg-gradient-to-r from-amber-500 to-orange-500 text-white shadow-md shadow-amber-200/50' : 'text-gray-700' }}">
            <div class="flex items-center gap-1 sm:gap-2">
              <svg class="w-4 h-4 sm:w-5 sm:h-5 {{ request()->routeIs('admin-prestamos.*') ? 'text-gray-900' : 'text-gray-500 group-hover:text-amber-600' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
              </svg>
              <span class="text-xs sm:text-sm md:text-base">Préstamos</span>
            </div>
            @if(request()->routeIs('admin-prestamos.*'))
              <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-4 sm:w-6 md:w-8 h-0.5 bg-gradient-to-r from-amber-500 to-orange-500 rounded-full shadow-sm"></div>
            @else
              <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-0 group-hover:w-4 sm:group-hover:w-6 md:group-hover:w-8 h-0.5 bg-gradient-to-r from-amber-500 to-orange-500 transition-all duration-300 rounded-full"></div>
            @endif
          </a>
        </li>
      @endif
      @if(auth()->user()->role === 'client')
        <li>
          <a href="{{ route('client-dashboard') }}" 
             class="px-2 sm:px-3 md:px-4 py-1.5 sm:py-2.5 rounded-xl font-medium transition-all duration-300 hover:bg-gradient-to-r hover:from-purple-50/80 hover:to-blue-50/80 hover:text-purple-700 group relative {{ request()->routeIs('client-dashboard') ? 'bg-gradient-to-r from-purple-500 to-blue-500 text-white shadow-md shadow-purple-200/50' : 'text-gray-700' }}">
            <div class="flex items-center gap-1 sm:gap-2">
              <svg class="w-4 h-4 sm:w-5 sm:h-5 {{ request()->routeIs('client-dashboard') ? 'text-gray-900' : 'text-gray-500 group-hover:text-purple-600' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
              </svg>
              <span class="text-xs sm:text-sm md:text-base">Dashboard</span>
            </div>
            @if(request()->routeIs('client-dashboard'))
              <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-4 sm:w-6 md:w-8 h-0.5 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full shadow-sm"></div>
            @else
              <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-0 group-hover:w-4 sm:group-hover:w-6 md:group-hover:w-8 h-0.5 bg-gradient-to-r from-purple-500 to-blue-500 transition-all duration-300 rounded-full"></div>
            @endif
          </a>
        </li>
        <li>
          <a href='{{ route('client-libros.index') }}' 
             class="px-2 sm:px-3 md:px-4 py-1.5 sm:py-2.5 rounded-xl font-medium transition-all duration-300 hover:bg-gradient-to-r hover:from-emerald-50/80 hover:to-teal-50/80 hover:text-emerald-700 group relative {{ request()->routeIs('client-libros.*') ? 'bg-gradient-to-r from-emerald-500 to-teal-500 text-white shadow-md shadow-emerald-200/50' : 'text-gray-700' }}">
            <div class="flex items-center gap-1 sm:gap-2">
              <svg class="w-4 h-4 sm:w-5 sm:h-5 {{ request()->routeIs('client-libros.*') ? 'text-gray-900' : 'text-gray-500 group-hover:text-emerald-600' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
              </svg>
              <span class="text-xs sm:text-sm md:text-base">Libros</span>
            </div>
            @if(request()->routeIs('client-libros.*'))
              <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-4 sm:w-6 md:w-8 h-0.5 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full shadow-sm"></div>
            @else
              <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-0 group-hover:w-4 sm:group-hover:w-6 md:group-hover:w-8 h-0.5 bg-gradient-to-r from-emerald-500 to-teal-500 transition-all duration-300 rounded-full"></div>
            @endif
          </a>
        </li>
        <li>
          <a href='{{ route('client-prestamos.index') }}' 
             class="px-2 sm:px-3 md:px-4 py-1.5 sm:py-2.5 rounded-xl font-medium transition-all duration-300 hover:bg-gradient-to-r hover:from-amber-50/80 hover:to-orange-50/80 hover:text-amber-700 group relative {{ request()->routeIs('client-prestamos.*') ? 'bg-gradient-to-r from-amber-500 to-orange-500 text-white shadow-md shadow-amber-200/50' : 'text-gray-700' }}">
            <div class="flex items-center gap-1 sm:gap-2">
              <svg class="w-4 h-4 sm:w-5 sm:h-5 {{ request()->routeIs('client-prestamos.*') ? 'text-gray-900' : 'text-gray-500 group-hover:text-amber-600' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
              </svg>
              <span class="text-xs sm:text-sm md:text-base">Mis Préstamos</span>
            </div>
            @if(request()->routeIs('client-prestamos.*'))
              <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-4 sm:w-6 md:w-8 h-0.5 bg-gradient-to-r from-amber-500 to-orange-500 rounded-full shadow-sm"></div>
            @else
              <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-0 group-hover:w-4 sm:group-hover:w-6 md:group-hover:w-8 h-0.5 bg-gradient-to-r from-amber-500 to-orange-500 transition-all duration-300 rounded-full"></div>
            @endif
          </a>
        </li>
        <li>
          <a href="{{ route('client-colecciones.index') }}" 
             class="px-2 sm:px-3 md:px-4 py-1.5 sm:py-2.5 rounded-xl font-medium transition-all duration-300 hover:bg-gradient-to-r hover:from-violet-50/80 hover:to-fuchsia-50/80 hover:text-violet-700 group relative {{ request()->routeIs('client-colecciones.*') ? 'bg-gradient-to-r from-violet-500 to-fuchsia-500 text-white shadow-md shadow-violet-200/50' : 'text-gray-700' }}">
            <div class="flex items-center gap-1 sm:gap-2">
              <svg class="w-4 h-4 sm:w-5 sm:h-5 {{ request()->routeIs('client-colecciones.*') ? 'text-gray-900' : 'text-gray-500 group-hover:text-violet-600' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
              </svg>
              <span class="text-xs sm:text-sm md:text-base">Colecciones</span>
            </div>
            @if(request()->routeIs('client-colecciones.*'))
              <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-4 sm:w-6 md:w-8 h-0.5 bg-gradient-to-r from-violet-500 to-fuchsia-500 rounded-full shadow-sm"></div>
            @else
              <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-0 group-hover:w-4 sm:group-hover:w-6 md:group-hover:w-8 h-0.5 bg-gradient-to-r from-violet-500 to-fuchsia-500 transition-all duration-300 rounded-full"></div>
            @endif
          </a>
        </li>
      @endif
    </ul>
  </div>
  <div class="navbar-end">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="cursor-pointer group relative px-3 sm:px-4 md:px-5 py-1.5 sm:py-2.5 rounded-xl bg-gradient-to-r from-red-50 to-pink-50 hover:from-red-100 hover:to-pink-100 text-red-700 font-medium transition-all duration-300 hover:shadow-md overflow-hidden">
        <div class="flex items-center gap-1 sm:gap-2 relative z-10">
          <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 md:w-5 md:h-5 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
          </svg>
          <span class="text-xs sm:text-sm md:text-base">Salir</span>
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-red-500 to-pink-500 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
        <span class="absolute inset-0 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-20">
          <div class="flex items-center gap-1 sm:gap-2">
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
            <span class="text-xs sm:text-sm md:text-base">Salir</span>
          </div>
        </span>
      </button>
    </form>
  </div>
</div>