<!DOCTYPE html>
<html>
<head>
    <title>Detalles en Tabla</title>
    <style>
        /* Estilos para el PDF */
        body {
            font-family: Georgia, serif;
            margin: 20px;
            font-size: 16px; /* Tamaño de letra */
        }
        .container {
            width: 100%;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            font-size: 14px; /* Tamaño de letra ligeramente mayor para el título */
        }
        /* Estilos para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
            vertical-align: top; /* Alinear el contenido en la parte superior */
            font-family: Georgia, serif;
            font-size: 12px; /* Tamaño de letra */
        }
        th {
            background-color: #f2f2f2;
        }
        .narrow-column {
            width: 25%; /* Ancho reducido para esta columna */
        }
        .description-column {
            width: 60%; /* Mayor espacio para la descripción */
        }
        .importe-column {
            width: 15%; /* Reducir el tamaño de la columna de importe */
        }
        .Patron-column {
            width: 30%; /* Ancho mayor para Patron/Placa/Catastro/Varios */
        }
        .nit-column {
            width: 25%; /* Ancho ajustado para N.I.T. */
        }
        .avenida-column {
            width: 30%; /* Ancho ajustado para Avenida */
        }
        .zona-column {
            width: 30%; /* Ancho ajustado para Zona */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Detalles de la Tabla</h1>
        </div>
        <div class="details">
            <!-- Tabla con diferentes números de columnas por fila -->
            <table>
                <tbody>
                    <!-- Primera fila con dos columnas que abarcan 2 columnas cada una -->
                    <tr>
                        <td class="Patron-column">Patron/Placa/Catastro/Varios</td>
                        <td colspan="2">Nombre del contribuyente o razón social</td>
                    </tr>
                    <!-- Segunda fila con tres columnas -->
                    <tr>
                        <td class="nit-column">N.I.T.<br>C.I.</td>
                        <td>********************</td>
                        <td>N. Celular:</td>
                    </tr>
                    <!-- Tercera fila con cuatro columnas -->
                    <tr>
                        <td>P.M.C:</td>
                        <td class="avenida-column">Avenida:</td>
                        <td>N.Puerta</td>
                        <td class="zona-column">Zona:</td> <!-- Ancho ajustado para Zona -->
                    </tr>
                    <!-- Cuarta fila con cuatro columnas -->
                    <tr>
                        <td>*******</td>
                        <td>**********</td>
                        <td>**********</td>
                        <td>***********</td>
                    </tr>
                    <!-- Nueva primera fila adicional con una columna -->
                    <tr>
                        <td colspan="4">Actividad:</td>
                    </tr>
                    <!-- Nueva segunda fila adicional con tres columnas ajustadas -->
                    <tr>
                        <td>Código:</td>
                        <td class="description-column">Descripción:</td>
                        <td class="importe-column" colspan="2">Importe:</td>
                    </tr>
                    <!-- Nueva tercera fila adicional con tres columnas ajustadas -->
                    <tr>
                        <td>******</td>
                        <td class="description-column">******</td>
                        <td class="importe-column" colspan="2">******</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
