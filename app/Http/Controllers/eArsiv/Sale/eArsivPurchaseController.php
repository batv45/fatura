<?php

namespace App\Http\Controllers\eArsiv\Sale;

use App\Http\Controllers\Controller;
use App\Http\Controllers\eArsiv\eArsivController;
use furkankadioglu\eFatura\InvoiceManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class eArsivPurchaseController extends eArsivController
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


        return inertia('eArsiv/Sale/Index', [
            'page_invoices' => $invoices
        ]);
    }
}
