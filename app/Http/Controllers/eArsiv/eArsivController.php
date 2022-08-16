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
