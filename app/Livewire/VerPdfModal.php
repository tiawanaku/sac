<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VerPdfModal extends Component
{
    public $pdfUrl;
    public $open = false;

    protected $listeners = ['openPdfModal' => 'showPdf'];

    public function showPdf($recordId)
    {
        $exhumacion = \App\Models\Exhumacion::find($recordId);
        if ($exhumacion && $exhumacion->comprobante_pdf) {
            $this->pdfUrl = asset('storage/app/public/pdfs/' . $exhumacion->comprobante_pdf);
            $this->open = true;
        }
    }

    public function render()
    {
        return view('livewire.ver-pdf-modal');
    }
}