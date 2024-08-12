<?php

namespace App\Http\Controllers;

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Illuminate\Http\Request;
use App\Models\Inhumacione;

class DonwloadPdfController extends Controller
{
    public function donwload($recordId)
    {
        // Encuentra el registro de la base de datos (ajusta según tus necesidades)
        $inhumacion = Inhumacione::findOrFail($recordId);

        // Crea el comprador (ajusta con los datos necesarios)
        $customer = new Buyer([
            'name'          => $inhumacion->nombre_difunto,
            'custom_fields' => [
                'email' => 'test@example.com',  // Puedes ajustar esto si tienes un correo real
            ],
        ]);

        // Crea los items de la factura (ajusta con tus datos)
        $item = InvoiceItem::make('Service 1')->pricePerUnit(2);

        // Crea la factura
        $invoice = Invoice::make()
            ->buyer($customer)
            ->discountByPercent(10)
            ->taxRate(15)
            ->shipping(1.99)
            ->addItem($item);

        // Genera el PDF y lo ofrece para su descarga
        return $invoice->download('invoice.pdf');
    }
}
