<?php

namespace App\Http\Controllers\eArsiv;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use furkankadioglu\eFatura\InvoiceManager;
use furkankadioglu\eFatura\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class eArsivController extends Controller
{
    public function index(InvoiceManager $client,Request $request)
    {
        $startDate = Date::now()->format('d/m/Y');
        $endDate = Date::now()->format('d/m/Y');

        if($request->get('startDate')){
            $startDate = Date::parse($request->get('startDate'))->format('d/m/Y');
            $endDate = Date::parse($request->get('endDate'))->format('d/m/Y');
        }

        $invoices = $client->getInvoicesFromAPI(
            $startDate,
            $endDate
        )['data'];
        $client->logOutFromAPI();


        return inertia('eArsiv/Index', [
            'page_invoices' => $invoices
        ]);
    }

    public function getPDF(InvoiceManager $client,$ettn)
    {
        return $this->getHTML($client,$ettn);
    }

    public function getHTML(InvoiceManager $client,$ettn)
    {
        $invoice = new Invoice();
        $invoice->setUuid($ettn);

        $html = $client->getInvoiceHTML($invoice);

        return $html;
    }
}
