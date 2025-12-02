<html>
    <head>
        <title>Inventario de Libros</title>
        <style>
            @page{margin: 40px 50px;}
            body{font-family: 'Segoe UI', 'Helvetica Neue', Arial, sans-serif; color: #333; background-color: #ffffff; line-height: 1.5;}
            .header{text-align: center; margin-bottom: 40px; padding-bottom: 25px; border-bottom: 3px solid transparent; border-image: linear-gradient(90deg, #6B21A8 0%, #C084FC 50%, #6B21A8 100%); border-image-slice: 1;}
            h1{font-size: 32px; font-weight: 800; color: #4C1D95; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1.5px; text-shadow: 1px 1px 3px rgba(107, 33, 168, 0.1);}
            .subtitle{font-size: 16px; color: #7C3AED; font-weight: 500; margin-bottom: 5px;}
            .date{font-size: 14px; color: #8B5CF6; font-style: italic;}
            table{width: 100%; border-collapse: separate; border-spacing: 0; font-size: 13px; box-shadow: 0 10px 30px rgba(107, 33, 168, 0.12); border-radius: 14px; overflow: hidden; background: white; border: 1px solid rgba(192, 132, 252, 0.3);}
            thead{background: linear-gradient(135deg, #6B21A8 0%, #8B5CF6 100%); color: rgb(120, 41, 210); border-bottom: 2px solid rgba(255, 255, 255, 0.4);}
            thead th{padding: 18px 15px; text-align: center; font-weight: 700; font-size: 13.5px; letter-spacing: 0.5px; text-transform: uppercase; border-right: 2px solid rgba(255, 255, 255, 0.25); position: relative; text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);}
            thead th:last-child{border-right: none;}
            thead th:not(:last-child)::after{content: ''; position: absolute; right: -1px; top: 15%; height: 70%; width: 1px; background: linear-gradient(to bottom, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.5));}
            tbody tr{transition: background-color 0.2s ease; border-bottom: 1px solid rgba(192, 132, 252, 0.25);}
            tbody tr:nth-child(even){background: linear-gradient(to right, #FAF5FF 0%, #F8F4FF 100%);}
            tbody tr:hover{background: linear-gradient(to right, #EDE9FE 0%, #E9E4FF 100%); box-shadow: inset 0 0 0 1px rgba(192, 132, 252, 0.3);}
            tbody tr:nth-child(even):hover{background: linear-gradient(to right, #EDE9FE 0%, #E9E4FF 100%);}
            td{padding: 16px 15px; border-bottom: 1px solid rgba(192, 132, 252, 0.25); color: #4B4453; font-weight: 400; text-align: center; vertical-align: middle; border-right: 1px solid rgba(192, 132, 252, 0.2); position: relative;}
            tbody tr:last-child td{border-bottom: 1px solid rgba(192, 132, 252, 0.15);}
            td:last-child{border-right: none;}
            th:last-child{border-right: none;}
            td::before{content: ''; position: absolute; left: 0; top: 10%; width: 4px; height: 80%; background: linear-gradient(to bottom, transparent, transparent); border-radius: 0 4px 4px 0; transition: background 0.3s ease;}
            tbody tr:hover td::before{background: linear-gradient(to bottom, #C084FC, #8B5CF6, #C084FC);}
            td:first-child{font-family: 'Courier New', monospace; font-weight: 700; color: #7C3AED; background: linear-gradient(to right, rgba(124, 58, 237, 0.05), transparent); border-left: 4px solid rgba(124, 58, 237, 0.3);}
            td:nth-child(2){font-weight: 600; color: #4C1D95; background: linear-gradient(to right, rgba(76, 29, 149, 0.03), transparent);}
            td:nth-child(3){font-style: italic; color: #6B7280; background: linear-gradient(to right, rgba(107, 114, 128, 0.03), transparent);}
            td:nth-child(4){font-weight: 500; color: #4B5563; background: linear-gradient(to right, rgba(75, 85, 99, 0.03), transparent);}
            td:nth-child(5){font-weight: 600; color: #374151; background: linear-gradient(to right, rgba(55, 65, 81, 0.03), transparent); border-right: none;}
            thead tr:first-child th:first-child{border-top-left-radius: 14px;}
            thead tr:first-child th:last-child{border-top-right-radius: 14px;}
            tbody tr:last-child td:first-child{border-bottom-left-radius: 14px;}
            tbody tr:last-child td:last-child{border-bottom-right-radius: 14px; border-bottom: none;}
            table::before{content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0; border-radius: 14px; box-shadow: inset 0 0 20px rgba(107, 33, 168, 0.08); pointer-events: none;}
            .table-footer{margin-top: 30px; text-align: right; font-size: 12px; color: #6B7280;}
            .total-count{background: linear-gradient(135deg, #F3E8FF 0%, #E9D5FF 100%); padding: 10px 20px; border-radius: 10px; display: inline-block; font-weight: 700; color: #6B21A8; border: 2px solid #C084FC; box-shadow: 0 4px 10px rgba(107, 33, 168, 0.15); font-size: 13px;}
            .footer{position: fixed; bottom: 0; left: 50px; right: 50px; text-align: center; font-size: 11px; color: #8B5CF6; padding: 10px 0; border-top: 2px solid; border-image: linear-gradient(90deg, transparent, #C084FC, transparent); border-image-slice: 1;}
            .page-number{position: fixed; bottom: 20px; right: 50px; font-size: 11px; color: #C084FC; font-weight: 500;}
        </style>
    </head>
    <body>
        <div class="header">
            <h1>Inventario de Libros</h1>
            <div class="subtitle">Catálogo Completo de la Biblioteca</div>
            <div class="date">Generado el {{ now()->setTimezone('America/Mexico_City')->format('d/m/Y H:i') }}</div>
        </div>
        <table>
            <thead>
                <tr>
                    <th style="width: 15%;">ISBN</th>
                    <th style="width: 30%;">TÍTULO</th>
                    <th style="width: 20%;">AUTOR</th>
                    <th style="width: 20%;">EDITORIAL</th>
                    <th style="width: 15%;">FECHA PUBLICACIÓN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $libro)
                    <tr>
                        <td>{{ $libro->isbn }}</td>
                        <td>{{ $libro->titulo }}</td>
                        <td>{{ $libro->autor }}</td>
                        <td>{{ $libro->editorial }}</td>
                        <td>{{ \Carbon\Carbon::parse($libro->fecha_publicacion)->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="table-footer">
            <div class="total-count">
                Total de Libros: {{ count($libros) }}
            </div>
        </div>
        <div class="footer">
            Sistema de Gestión de Bibliotecas © {{ now()->setTimezone('America/Mexico_City')->format('Y') }} • Todos los derechos reservados
        </div>
        <div class="page-number">
            Página 1 de 1
        </div>
    </body>
</html>