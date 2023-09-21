<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class SaleController extends Controller
{

    public function mainPage(): View
    {
        $this->logInfo('Child page loaded');
        return view('childPage',
            ['createdSales' => Sale::all()],
        );
    }

    public function createNewSale(Request $request): RedirectResponse
    {
        $this->logInfo('New sale created for product ' . $request->productName);

        $newSaleItem = new Sale();
        $newSaleItem->time = date('Y-m-d H:i:s');
        $newSaleItem->sale_number = 1;
        $newSaleItem->description = $request->productName;
        $newSaleItem->amount = $request->amount;
        $newSaleItem->currency = $request->currency;
        $newSaleItem->payment_link = 'http://d';
        $newSaleItem->save();
        return redirect('/');
    }

    public function logInfo($info): void
    {
        Log::info('DEBUG: ' . $info);
    }
}
