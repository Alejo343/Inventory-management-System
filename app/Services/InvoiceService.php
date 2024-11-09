<?php

namespace App\Services;

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use League\CommonMark\Delimiter\Delimiter;

class InvoiceService
{
    /**
     * Crear una factura con los datos de productos.
     *
     * @param array $productos Array de productos, cada uno con 'nombre', 'precio' y 'cantidad'.
     * @param array|null $buyerData Datos del comprador (opcional)
     * @return \LaravelDaily\Invoices\Invoice
     */
    public function crearFactura($products, $buyerData, $details)
    {


        $seller = new Party([
            'name'              => 'Distribuidores SA',
            'address'           => 'Cll 1N, Cr1 - Cali',
            'phone'             => '317 000 00 00',
            'custom_fields'     => [
                'Email'         => 'distribuidores@gmail.com',
                'Documento'     => '123.456.789',
            ],
        ]);


        $buyer = null;
        if ($buyerData) {
            $buyer = new Buyer([
                'name'              => $buyerData['name'],
                'address'           => $buyerData['address'],
                'phone'             => $buyerData['phone'],
                'custom_fields'     => [
                    'Email'         => $buyerData['email'],
                    'Documento'     => $buyerData['document_number'],
                ],
            ]);
        }

        // Crear los ítems de la factura
        $items = [];
        foreach ($products as $product) {
            $items[] = (new InvoiceItem())
                ->title($product->name)
                ->pricePerUnit($product->selling_price)
                ->quantity($product->quantity)
                ->units($product->unit->name);
        }


        // Configurar la factura
        // extraer el numero del codigo de factura
        $code = preg_replace('/\D/', '', $details['invoice_no']);
        $invoice = Invoice::make()
            ->buyer($buyer)
            ->seller($seller)
            ->series('INV')
            ->delimiter('-')
            ->sequence($code)
            ->currencySymbol('$')
            ->currencyCode('COP')
            ->filename('factura_' . $details['invoice_no'])
            ->logo(public_path('images/logo.png'));

        //agrega iva si tiene
        if ($details['iva'] != 0) {
            $invoice->taxRate($details['iva']);
        }

        // Agregar los ítems a la factura
        foreach ($items as $item) {
            $invoice->addItem($item);
        }

        return $invoice;
    }
}
