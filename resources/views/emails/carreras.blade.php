<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Carreras</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos adicionales para el reporte */
        .report-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .report-header h1 {
            font-size: 24px;
            font-weight: bold;
        }
        .report-header p {
            font-size: 14px;
            color: #666;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Encabezado del reporte -->
        <div class="report-header">
            <h1>Reporte de Carreras</h1>
            <p>Fecha de generación: {{ now()->format('d/m/Y H:i:s') }}</p>
        </div>

        <!-- Tabla para mostrar las carreras -->
        <table class="table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carreras as $carrera)
                    <tr>
                        <td>{{ $carrera->codigo_carrera }}</td>
                        <td>{{ $carrera->nombre_carrera }}</td>
                        <td>{{ $carrera->descripcion_carrera }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <footer>
        <div class="container">
            <div class="text-center">
                Reporte generado automaticamente por el 
                sistema.
            </div>
        </div>
    </footer>
</body>
</html>