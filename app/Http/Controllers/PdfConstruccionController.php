<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Helpers\NumberToWords;
use App\Models\AutorizacionConstruccionNicho;

class PdfConstruccionController extends Controller
{
    public function previewPdfConstruccion($id)
    {
        $AutorizacionConstruccionNicho = AutorizacionConstruccionNicho::findOrFail($id);
        //
        $nombre_contribuyente = $AutorizacionConstruccionNicho->nombre_contribuyente;
    }
}