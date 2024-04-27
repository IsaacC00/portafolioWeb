<!DOCTYPE html>
<html>
<head>
    <style>
        .email-body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            color: #111827;
            padding: 20px;
            line-height: 1.5;
        }
        .email-header {
            background-color: #f75605;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .email-content {
            background-color: white;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }
        .button {
            background-color: #6366f1;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 6px;
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-body">
        <div class="email-header">
            <h1>Recuperación de Contraseña</h1>
        </div>
        <div class="email-content">
            <p>Has recibido este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para tu cuenta.</p>
            <a href="{{route('reset.password',$token)}}" class="button">Restablecer Contraseña</a>
            <p>Si no solicitaste un restablecimiento de contraseña, no se requiere ninguna acción adicional.</p>
        </div>
    </div>
</body>
</html>


