<html>
    <head>
        <title>Notificación de Préstamo - Sistema de Biblioteca</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital@0;1&display=swap');
            body{font-family:'Inter','Segoe UI','Helvetica Neue',Arial,sans-serif;color:#333;background-color:#f9fafb;line-height:1.6;margin:0;padding:20px;}
            .email-container{max-width:600px;margin:0 auto;background-color:#ffffff;border-radius:20px;overflow:hidden;box-shadow:0 10px 30px rgba(107,33,168,0.12);border:1px solid rgba(192,132,252,0.3);}
            .header{background:linear-gradient(135deg,#6B21A8 0%,#8B5CF6 100%);padding:40px 30px;text-align:center;color:white;}
            .header h1{font-family:'Playfair Display',serif;font-size:32px;font-weight:700;font-style:italic;margin:0 0 10px 0;text-shadow:1px 1px 3px rgba(0,0,0,0.2);letter-spacing:0.5px;}
            .header p{font-size:16px;opacity:0.9;margin:0;font-weight:400;}
            .content{padding:40px 30px;}
            .notification-card{background:linear-gradient(to right,#FAF5FF 0%,#F8F4FF 100%);border-radius:16px;padding:30px;border:2px solid rgba(192,132,252,0.3);margin-bottom:30px;box-shadow:0 5px 20px rgba(107,33,168,0.08);}
            .notification-title{font-size:22px;font-weight:700;color:#4C1D95;margin-bottom:20px;text-align:center;font-family:'Playfair Display',serif;font-style:italic;}
            .info-grid{display:grid;grid-template-columns:1fr;gap:20px;margin-bottom:25px;}
            .info-item{display:flex;align-items:center;gap:15px;padding:15px;background:white;border-radius:12px;border:1px solid rgba(192,132,252,0.2);box-shadow:0 2px 8px rgba(107,33,168,0.05);}
            .icon-circle{width:50px;height:50px;border-radius:50%;background:linear-gradient(135deg,#6B21A8 0%,#8B5CF6 100%);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
            .icon-circle img{width:24px;height:24px;filter:brightness(0) invert(1);}
            .info-content h3{font-size:16px;font-weight:600;color:#4C1D95;margin:0 0 5px 0;}
            .info-content p{font-size:18px;font-weight:700;color:#1F2937;margin:0;}
            .highlight-box{background:linear-gradient(135deg,#F3E8FF 0%,#E9D5FF 100%);border:2px solid #C084FC;border-radius:12px;padding:20px;text-align:center;margin-top:25px;}
            .highlight-box p{font-size:16px;color:#6B21A8;font-weight:600;margin:0;}
            .highlight-box strong{color:#4C1D95;font-size:18px;}
            .message{font-size:16px;color:#4B5563;line-height:1.7;margin-bottom:25px;text-align:center;}
            .footer{text-align:center;padding:25px 30px;background:linear-gradient(to right,#F9FAFB 0%,#F3F4F6 100%);border-top:2px solid rgba(192,132,252,0.2);color:#6B7280;font-size:14px;}
            .footer p{margin:5px 0;}
            .logo{font-family:'Playfair Display',serif;font-size:20px;font-weight:700;color:#6B21A8;margin-bottom:10px;font-style:italic;}
            .date-badge{display:inline-block;background:linear-gradient(135deg,#F59E0B 0%,#FBBF24 100%);color:white;padding:8px 20px;border-radius:25px;font-weight:700;font-size:15px;margin:10px 0;box-shadow:0 3px 10px rgba(245,158,11,0.2);}
            .book-icon{background:linear-gradient(135deg,#10B981 0%,#34D399 100%);}
            .calendar-icon{background:linear-gradient(135deg,#3B82F6 0%,#60A5FA 100%);}
            @media(max-width:600px){.content{padding:25px 20px;}.notification-card{padding:20px;}.header h1{font-size:26px;}.info-item{flex-direction:column;text-align:center;gap:10px;}}
        </style>
    </head>
    <body>
        <div class="email-container">
            <div class="header">
                <h1>Sistema de Gestión de Bibliotecas</h1>
                <p>Notificación oficial de préstamo</p>
            </div>
            <div class="content">
                <div class="notification-card">
                    <h2 class="notification-title">¡Préstamo Registrado Exitosamente!</h2>
                    <div class="message">
                        Se ha registrado correctamente tu solicitud de préstamo en nuestro sistema de biblioteca.
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="icon-circle book-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <div class="info-content">
                                <h3>Libro Prestado</h3>
                                <p>{{ $prestamo->libro->titulo }}</p>
                                <small style="color: #6B7280; font-size: 14px;">{{ $prestamo->libro->autor }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="highlight-box">
                        <p>Recuerda que la fecha límite para la devolución es: <strong>{{ $prestamo->fecha_limite }}</strong></p>
                    </div>
                    <div class="message" style="margin-top: 25px;">
                        Por favor, asegúrate de devolver el libro antes de la fecha indicada para evitar inconvenientes.
                        ¡Disfruta de tu lectura!
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="logo">Biblioteca Digital</div>
                <p>Sistema de Gestión de Bibliotecas © {{ now()->format('Y') }}</p>
                <p>Este es un mensaje automático, por favor no responder a este correo</p>
                <p style="font-size: 12px; color: #9CA3AF; margin-top: 10px;">
                    Si tienes alguna duda, contacta con la administración de la biblioteca
                </p>
            </div>
        </div>
    </body>
</html>