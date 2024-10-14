<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inhumación</title>
    <style>
        body {
            width: 21.5cm;
            height: 28cm;
            margin: 0;
            padding: 0;
            position: relative;
            font-family: Arial, sans-serif;
        }

        .positioned {
            position: absolute;
        }

        .item1 {
            left: 1cm;
            top: 2.3cm;
        }

        .item2 {
            left: 2.2cm;
            top: 4.2cm;
        }

        .item3 {
            left: 6.1cm;
            top: 4.2cm;
        }

        .item4 {
            left: 14.5cm;
            top: 4.2cm;
        }

        .item5 {
            left: 7.5cm;
            top: 5.6cm;
        }

        .item6 {
            left: 12.7cm;
            top: 5.6cm;
        }

        .item7 {
            left: 14.9cm;
            top: 5.6cm;
        }

        .item8 {
            left: 4.5cm;
            top: 6.4cm;
        }

        .item9 {
            left: 3.5cm;
            top: 8.1cm;
        }

        .item10 {
            left: 7.2cm;
            top: 8.1cm;
        }

        .item11 {
            left: 3.5cm;
            top: 8.8cm;
        }

        .item12 {
            left: 7.2cm;
            top: 8.8cm;
        }

        .item13 {
            left: 17cm;
            top: 8.8cm;
        }

        .item14 {
            left: 1cm;
            top: 10.6cm;
        }

        .item15 {
            left: 3.5cm;
            top: 9.5cm;
        }

        .item16 {
            left: 7.2cm;
            top: 9.5cm;
        }

        .item17 {
            left: 4.9cm;
            top: 12.1cm;
        }

        .item18 {
            left: 4.9cm;
            top: 12.9cm;
        }

        .item19 {
            left: 3.5cm;
            top: 10.1cm;
        }

        .item20 {
            left: 17cm;
            top: 16.5cm;
        }

        .item21 {
            left: 7.3cm;
            top: 15.1cm;
        }

        .item22 {
            left: 6cm;
            top: 17.5cm;
        }

        .item23 {
            left: 2cm;
            top: 16.4cm;
        }
    </style>
</head>

<body>
    <div class="section">
        <div class="positioned item1">
            {{ \Carbon\Carbon::parse($inhumacion->fecha_inhumacion)->format('d    m      y') }}
        </div>
    </div>
    <div class="positioned item2">{{ $numero_carnet_difunto }}</div>
    <div class="positioned item3">{{ $nombres_difunto }} {{ $apellido_paterno_difunto }} {{ $apellido_materno_difunto }}</div>
    <div class="positioned item4">{{ $celular }}</div>
    <div class="positioned item5">{{ $direccion }}</div>
    <div class="positioned item6">{{ $fecha_inhumacion }}</div>
    <div class="positioned item7">{{ $fecha_vencimiento }}</div>
    <div class="positioned item8">Inhumación de Restos</div>
    <div class="positioned item9">DIFUNTO(A):</div>
    <div class="positioned item10">{{ $nombres_difunto }}</div>
    <div class="positioned item11">PAGO POR:</div>
    <div class="positioned item12">INHUMACIÓN DE RESTOS</div>
    <div class="positioned item13">{{ $nombres_contribuyente }}</div>

    <div class="positioned item14">4,17</div>

    <div class="positioned item15">AUTORIZADO EL:</div>
    <div class="positioned item16">{{ $fecha_inhumacion }}</div>
    <div class="positioned item19">INHUMACIÓN TEMPORAL</div>
    <div class="positioned item20">{{ $fecha_vencimiento }}</div>

    <div class="positioned item22">Motivo de Inhumación</div>
    <div class="positioned item23"> {{ $nombres_contribuyente }} </div>
</body>

</html>