<x-base>
    <h1 class="text-5xl font-bold">Dashboard</h1>

    <h2>Frase del día:</h2>
    <p class="italic mb-6">{{ $fraseDelDia }}</p>

    <div class="stats shadow">
        <div class="stat">
            <div class="stat-title">Libros registrados</div>
            <div class="stat-value">{{ $totalLibros }}</div>
        </div>

        <div class="stat">
            <div class="stat-title">Préstamos en curso</div>
            <div class="stat-value text-warning">{{ $prestamosPendientes }}</div>
        </div>
    </div>
</x-base>