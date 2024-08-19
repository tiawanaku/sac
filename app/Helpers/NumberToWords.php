<?php

namespace App\Helpers;

class NumberToWords
{
    public static function convertir($numero)
    {
        $unidad = array(
            0 => 'cero',
            1 => 'uno',
            2 => 'dos',
            3 => 'tres',
            4 => 'cuatro',
            5 => 'cinco',
            6 => 'seis',
            7 => 'siete',
            8 => 'ocho',
            9 => 'nueve'
        );

        $decena = array(
            10 => 'diez',
            11 => 'once',
            12 => 'doce',
            13 => 'trece',
            14 => 'catorce',
            15 => 'quince',
            16 => 'dieciséis',
            17 => 'diecisiete',
            18 => 'dieciocho',
            19 => 'diecinueve',
            20 => 'veinte',
            30 => 'treinta',
            40 => 'cuarenta',
            50 => 'cincuenta',
            60 => 'sesenta',
            70 => 'setenta',
            80 => 'ochenta',
            90 => 'noventa'
        );

        $centena = array(
            100 => 'cien',
            200 => 'doscientos',
            300 => 'trescientos',
            400 => 'cuatrocientos',
            500 => 'quinientos',
            600 => 'seiscientos',
            700 => 'setecientos',
            800 => 'ochocientos',
            900 => 'novecientos'
        );

        if ($numero < 10) {
            return $unidad[$numero];
        } elseif ($numero < 20) {
            return $decena[$numero];
        } elseif ($numero < 30) {
            return 'veinti' . ($numero > 20 ? ' ' . $unidad[$numero - 20] : '');
        } elseif ($numero < 100) {
            $u = $numero % 10;
            $d = $numero - $u;
            return $decena[$d] . ($u ? ' y ' . $unidad[$u] : '');
        } elseif ($numero < 1000) {
            if ($numero == 100) {
                return 'cien';
            }
            $u = $numero % 100;
            $c = $numero - $u;
            return $centena[$c] . ($u ? ' ' . self::convertir($u) : '');
        }

        return 'Número fuera de rango'; // Puedes extender esto para números mayores
    }
}