<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Construccion</title>
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
            /* 1.9cm + 0.4cm */
        }

        .item2 {
            left: 2.2cm;
            top: 4.2cm;
            /* 3.8cm + 0.4cm */
        }

        .item3 {
            left: 6.1cm;
            top: 4.2cm;
            /* 3.8cm + 0.4cm */
        }

        .item4 {
            left: 14.5cm;
            top: 4.2cm;
            /* 3.8cm + 0.4cm */
        }

        .item5 {
            left: 7.5cm;
            top: 5.6cm;
            /* 5.2cm + 0.4cm */
        }

        .item6 {
            left: 12.7cm;
            top: 5.6cm;
            /* 5.2cm + 0.4cm */
        }

        .item7 {
            left: 14.9cm;
            top: 5.6cm;
            /* 5.2cm + 0.4cm */
        }

        .item8 {
            left: 4.5cm;
            top: 6.4cm;
            /* 5.9cm + 0.4cm */
        }

        .item9 {
            left: 3.5cm;
            top: 8.1cm;
            /* 7.7cm + 0.4cm */
        }

        .item10 {
            left: 7.2cm;
            top: 8.1cm;
            /* 7.7cm + 0.4cm */
        }

        .item11 {
            left: 3.5cm;
            top: 8.8cm;
            /* 8.2cm + 0.4cm */
        }

        .item12 {
            left: 7.2cm;
            top: 8.8cm;
            /* 8.2cm + 0.4cm */
        }

        .item13 {
            left: 17cm;
            top: 8.8cm;
            /* 8.2cm + 0.4cm */
        }

        .item14 {
            left: 1cm;
            top: 10.6cm;
            /* 10.2cm + 0.4cm */
        }

        .item15 {
            left: 3.5cm;
            top: 9.5cm;
            /* 11.2cm + 0.4cm */
        }

        .item16 {
            left: 7.2cm;
            top: 9.5cm;
            /* 11.2cm + 0.4cm */
        }

        .item17 {
            left: 4.9cm;
            top: 12.1cm;
            /* 11.7cm + 0.4cm */
        }

        .item18 {
            left: 4.9cm;
            top: 12.9cm;
            /* 12.5cm + 0.4cm */
        }

        .item19 {
            left: 3.5cm;
            top: 10.1cm;
            /* 14.7cm + 0.4cm */
        }

        .item20 {
            left: 17cm;
            top: 16.5cm;
            /* 17.7cm + 0.4cm */
        }

        .item21 {
            left: 7.3cm;
            top: 15.1cm;
            /* 15.7cm + 0.4cm */
        }

        .item22 {
            left: 6cm;
            top: 17.5cm;
            /* 18.4cm + 0.4cm */
        }

        .item23 {
            left: 2cm;
            top: 16.4cm;
            /* 18.4cm + 0.4cm */
        }
    </style>
</head>

<body>
    <div class="section">
        <div class="positioned item1">
            {{ \Carbon\Carbon::parse($AutorizacionConstruccionNicho->fecha_autorizacion_construccion)->format('d    m      y') }}
        </div>

    </div>
    <div class="positioned item2">{{ $ci_nit }}</div>
    <div class="positioned item3">{{ $nombre_contribuyente }}</div>
    <div class="positioned item4">CEL:{{ $numero_celular }}</div>
    <div class="positioned item5">{{ $avenida_calle }}</div>
    <div class="positioned item6">{{ $numero }}</div>
    <div class="positioned item7">{{ $zona }}</div>
    <div class="positioned item8">{{ $actividad }}</div>
    <div class="positioned item9">DIFUNTO(A):</div>
    <div class="positioned item10">{{ $nombre_difunto }}</div>
    <div class="positioned item11">PAGO POR:</div>
    <div class="positioned item12">{{ $actividad }}</div>
    <div class="positioned item13">{{ $costo }}</div>

    <div class="positioned item14">4,17</div>

    <div class="positioned item15">AUTORIZADO EL:</div>
    <div class="positioned item16">{{$fecha_autorizacion }}</div>
    <div class="positioned item19">INHUMACION TEMPORAL MAXIMO 6 AÑOS</div>
    <div class="positioned item20">{{ $costo_total }}</div>

    <div class="positioned item22">{{ $actividad }}</div>
    <div class="positioned item23"> {{ $costo_total_literal }} 00/100</div>
</body>

</html>