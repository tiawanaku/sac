<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Posicionado</title>
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
            left: 1.3cm;
            top: 2.3cm; /* 1.9cm + 0.4cm */
        }
        .item2 {
            left: 2.2cm;
            top: 4.2cm; /* 3.8cm + 0.4cm */
        }
        .item3 {
            left: 8.1cm;
            top: 4.2cm; /* 3.8cm + 0.4cm */
        }
        .item4 {
            left: 16.5cm;
            top: 4.2cm; /* 3.8cm + 0.4cm */
        }
        .item5 {
            left: 7.5cm;
            top: 5.6cm; /* 5.2cm + 0.4cm */
        }
        .item6 {
            left: 12.7cm;
            top: 5.6cm; /* 5.2cm + 0.4cm */
        }
        .item7 {
            left: 14.9cm;
            top: 5.6cm; /* 5.2cm + 0.4cm */
        }
        .item8 {
            left: 4.5cm;
            top: 6.3cm; /* 5.9cm + 0.4cm */
        }
        .item9 {
            left: 4.5cm;
            top: 8.1cm; /* 7.7cm + 0.4cm */
        }
        .item10 {
            left: 7cm;
            top: 8.1cm; /* 7.7cm + 0.4cm */
        }
        .item11 {
            left: 4.5cm;
            top: 8.6cm; /* 8.2cm + 0.4cm */
        }
        .item12 {
            left: 6.9cm;
            top: 8.6cm; /* 8.2cm + 0.4cm */
        }
        .item13 {
            left: 19cm;
            top: 8.6cm; /* 8.2cm + 0.4cm */
        }
        .item14 {
            left: 2cm;
            top: 10.6cm; /* 10.2cm + 0.4cm */
        }
        .item15 {
            left: 4.9cm;
            top: 11.6cm; /* 11.2cm + 0.4cm */
        }
        .item16 {
            left: 9cm;
            top: 11.6cm; /* 11.2cm + 0.4cm */
        }
        .item17 {
            left: 4.9cm;
            top: 12.1cm; /* 11.7cm + 0.4cm */
        }
        .item18 {
            left: 4.9cm;
            top: 12.9cm; /* 12.5cm + 0.4cm */
        }
        .item19 {
            left: 4.9cm;
            top: 15.1cm; /* 14.7cm + 0.4cm */
        }
        .item20 {
            left: 17.5cm;
            top: 16.5cm; /* 17.7cm + 0.4cm */
        }
        .item21 {
            left: 7.3cm;
            top: 15.1cm; /* 15.7cm + 0.4cm */
        }
        .item22 {
            left: 13cm;
            top: 17.5cm; /* 18.4cm + 0.4cm */
        }
        .item23 {
            left: 2cm;
            top: 16.4cm; /* 18.4cm + 0.4cm */
        }
    </style>
</head>
<body>
    <div class="section">
        <div class="positioned item1">{{ \Carbon\Carbon::parse($exhumacion->fecha_exhumacion)->format('d    m      y') }}</div>
    </div>
    <div class="positioned item2">2376689 Q,R.</div>
    <div class="positioned item3">MIGUEL TEDY SALCEDO MORON</div>
    <div class="positioned item4">Cel. 73288101</div>
    <div class="positioned item5">Av. Bolivia</div>
    <div class="positioned item6">38</div>
    <div class="positioned item7">z/villa adela</div>
    <div class="positioned item8">RENOVACION DE NICHO MAYOR</div>
    <div class="positioned item9">DIFUNTO(A):</div>
    <div class="positioned item10">LAURA MORON PONCE</div>
    <div class="positioned item11">PAGO POR:</div>
    <div class="positioned item12">AUTORIZACION DE EXHUMACION DE RESTOS OSEOS</div>
    <div class="positioned item13">{{ $costo_servicio }}</div>

    <div class="positioned item14">4,17</div>

    <div class="positioned item15">desde:</div>
    <div class="positioned item16">09-03-24</div>
    <div class="positioned item17">vencimiento:</div>
    <div class="positioned item18">ultima renovacion</div>
    <div class="positioned item19">nombre</div>
    <div class="positioned item20">{{ $costo_total }}</div>
    <div class="positioned item21">Inhumacion</div>
    <div class="positioned item22">{{ $motivo_exhumacion }}</div>
    <div class="positioned item23"> {{ $costo_total_literal }} 00/100</div>
</body>
</html>
