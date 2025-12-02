<html>
    <head>
        <title>Reporte de Préstamos</title>
        <style>
            @page{margin: 40px 50px;}
            body{font-family: 'Segoe UI', 'Helvetica Neue', Arial, sans-serif; color: #333; background-color: #ffffff; line-height: 1.5;}
            .header{text-align: center; margin-bottom: 40px; padding-bottom: 25px; border-bottom: 3px solid transparent; border-image: linear-gradient(90deg, #0EA5E9 0%, #3B82F6 50%, #0EA5E9 100%); border-image-slice: 1;}
            h1{font-size: 32px; font-weight: 800; color: #1E40AF; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1.5px; text-shadow: 1px 1px 3px rgba(14, 165, 233, 0.1);}
            .subtitle{font-size: 16px; color: #2563EB; font-weight: 500; margin-bottom: 5px;}
            .date{font-size: 14px; color: #3B82F6; font-style: italic;}
            table{width: 100%; border-collapse: separate; border-spacing: 0; font-size: 13px; box-shadow: 0 10px 30px rgba(14, 165, 233, 0.12); border-radius: 14px; overflow: hidden; background: white; border: 1px solid rgba(59, 130, 246, 0.3);}
            thead{background: linear-gradient(135deg, #0EA5E9 0%, #3B82F6 100%); border-bottom: 2px solid rgba(255, 255, 255, 0.4);}
            thead th{padding: 18px 15px; text-align: center; font-weight: 700; font-size: 13.5px; letter-spacing: 0.5px; text-transform: uppercase; border-right: 2px solid rgba(255, 255, 255, 0.25); position: relative; text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);}
            thead th:last-child{border-right: none;}
            thead th:not(:last-child)::after{content: ''; position: absolute; right: -1px; top: 15%; height: 70%; width: 1px; background: linear-gradient(to bottom, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.5));}
            tbody tr{transition: background-color 0.2s ease; border-bottom: 1px solid rgba(59, 130, 246, 0.25);}
            tbody tr:nth-child(even){background: linear-gradient(to right, #F0F9FF 0%, #EFF6FF 100%);}
            tbody tr:hover{background: linear-gradient(to right, #E0F2FE 0%, #DBEAFE 100%); box-shadow: inset 0 0 0 1px rgba(59, 130, 246, 0.3);}
            tbody tr:nth-child(even):hover{background: linear-gradient(to right, #E0F2FE 0%, #DBEAFE 100%);}
            td{padding: 16px 15px; border-bottom: 1px solid rgba(59, 130, 246, 0.25); color: #4B4453; font-weight: 400; text-align: center; vertical-align: middle; border-right: 1px solid rgba(59, 130, 246, 0.2); position: relative;}
            tbody tr:last-child td{border-bottom: 1px solid rgba(59, 130, 246, 0.15);}
            td:last-child{border-right: none;}
            th:last-child{border-right: none;}
            td::before{content: ''; position: absolute; left: 0; top: 10%; width: 4px; height: 80%; background: linear-gradient(to bottom, transparent, transparent); border-radius: 0 4px 4px 0; transition: background 0.3s ease;}
            tbody tr:hover td::before{background: linear-gradient(to bottom, #3B82F6, #0EA5E9, #3B82F6);}
            td:first-child{font-weight: 600; color: #1E40AF; background: linear-gradient(to right, rgba(30, 64, 175, 0.05), transparent); border-left: 4px solid rgba(30, 64, 175, 0.3);}
            td:nth-child(2){font-weight: 500; color: #1D4ED8; background: linear-gradient(to right, rgba(29, 78, 216, 0.05), transparent);}
            td:nth-child(3){font-weight: 500; color: #2563EB; background: linear-gradient(to right, rgba(37, 99, 235, 0.05), transparent);}
            td:nth-child(4){font-weight: 600; color: #374151; background: linear-gradient(to right, rgba(55, 65, 81, 0.03), transparent); border-right: none;}
            thead tr:first-child th:first-child{border-top-left-radius: 14px;}
            thead tr:first-child th:last-child{border-top-right-radius: 14px;}
            tbody tr:last-child td:first-child{border-bottom-left-radius: 14px;}
            tbody tr:last-child td:last-child{border-bottom-right-radius: 14px; border-bottom: none;}
            table::before{content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0; border-radius: 14px; box-shadow: inset 0 0 20px rgba(14, 165, 233, 0.08); pointer-events: none;}
            .table-footer{margin-top: 30px; text-align: right; font-size: 12px; color: #6B7280;}
            .total-count{background: linear-gradient(135deg, #E0F2FE 0%, #DBEAFE 100%); padding: 10px 20px; border-radius: 10px; display: inline-block; font-weight: 700; color: #1E40AF; border: 2px solid #3B82F6; box-shadow: 0 4px 10px rgba(14, 165, 233, 0.15); font-size: 13px;}
            .footer{position: fixed; bottom: 0; left: 50px; right: 50px; text-align: center; font-size: 11px; color: #3B82F6; padding: 10px 0; border-top: 2px solid; border-image: linear-gradient(90deg, transparent, #3B82F6, transparent); border-image-slice: 1;}
            .page-number{position: fixed; bottom: 20px; right: 50px; font-size: 11px; color: #3B82F6; font-weight: 500;}
            .status-badge{padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; display: inline-block;}
            .status-devuelto{background: linear-gradient(135deg, #10B981 0%, #34D399 100%); color: #3B82F6; font-size: 12px; font-weight: 600;}
            .status-pendiente{background: linear-gradient(135deg, #F59E0B 0%, #FBBF24 100%); color: #e6b736;}
        </style>
    </head>
    <body>
        <div class="header">
            <h1>Historial de Préstamos</h1>
            <div class="subtitle">Registro Completo de Préstamos</div>
            <div class="date">Generado el {{ now()->setTimezone('America/Mexico_City')->format('d/m/Y H:i') }}</div>
        </div>
        <table>
            <thead>
                <tr>
                    <th style="width: 35%;">LIBRO</th>
                    <th style="width: 25%;">USUARIO</th>
                    <th style="width: 20%;">FECHA DE PRÉSTAMO</th>
                    <th style="width: 20%;">FECHA DE DEVOLUCIÓN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestamos as $prestamo)
                    <tr>
                        <td>{{ $prestamo->libro->titulo }}</td>
                        <td>{{ $prestamo->user->name }}</td>
                        <td>{{ $prestamo->fecha_prestamo }}</td>
                        <td>
                            @if($prestamo->fecha_devolucion)
                                <span class="status-badge status-devuelto">{{ $prestamo->fecha_devolucion }}</span>
                            @else
                                <span class="status-badge status-pendiente">PENDIENTE</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="table-footer">
            <div class="total-count">
                Total de Préstamos: {{ count($prestamos) }}
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