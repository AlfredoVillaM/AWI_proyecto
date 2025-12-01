<html>
    <head>
        <title>Notificación de Préstamo</title>
        <style>
            
        </style>
    </head>
    <body>
        <h1>Notificación de Préstamo</h1>
        <p>Se ha registrado tu préstamo del libro: <strong>{{ $prestamo->libro->titulo }}</strong>. La fecha límite para su devolución es: <strong>{{ $prestamo->fecha_limite }}</strong>.</p>
    </body>
</html>