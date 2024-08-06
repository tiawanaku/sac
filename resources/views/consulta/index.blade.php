<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Campo Santo Mercedario</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .data-icon {
            font-size: 1.5rem;
            color: #007bff;
        }
        .data-item {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Ingrese los datos de la Busqueda</h1>
        <form method="POST" action="{{ url('/enviar-datos') }}">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese apellido" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        @if (isset($responseMessage))
            <div class="mt-3">
                <h3>Resultado de la Busqueda:</h3>
                @php
                    $data = json_decode($responseMessage, true);
                    $item = isset($data[0]) ? $data[0] : [];
                @endphp
                @if (isset($item['nombres']))
                    <div class="data-item">
                        <i class="fas fa-user data-icon"></i> <strong>Nombre:</strong> {{ htmlspecialchars($item['nombres']) }}
                    </div>
                @endif
                @if (isset($item['apellidos']))
                    <div class="data-item">
                        <i class="fas fa-user data-icon"></i> <strong>Apellido:</strong> {{ htmlspecialchars($item['apellidos']) }}
                    </div>
                @endif
                @if (isset($item['sector']))
                    <div class="data-item">
                        <i class="fas fa-map-marker-alt data-icon"></i> <strong>Sector:</strong> {{ htmlspecialchars($item['sector']) }}
                    </div>
                @endif
                @if (isset($item['estado']))
                    <div class="data-item">
                        <i class="fas fa-check-circle data-icon"></i> <strong>Estado:</strong> {{ htmlspecialchars($item['estado']) }}
                    </div>
                @endif
                @if (isset($item['tipo']))
                    <div class="data-item">
                        <i class="fas fa-tag data-icon"></i> <strong>Tipo:</strong> {{ htmlspecialchars($item['tipo']) }}
                    </div>
                @endif

                <!-- Botón de volver a la pantalla principal -->
                <a href="http://127.0.0.1:8000/" class="btn btn-secondary mt-3">Volver a Pantalla Principal</a>
            </div>
        @endif
    </div>
</body>
</html>
