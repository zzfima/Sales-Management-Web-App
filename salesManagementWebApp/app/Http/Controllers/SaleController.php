<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SaleController extends Controller
{
    public function GetCurrencies(): array
    {
        return ['ILS', 'USD', 'EUR'];
    }

    public function mainPage(): View
    {
        $this->logInfo('Child page loaded');
        return view('childPage',
            ['createdSales' => Sale::all()],
            ['currencies' => $this->GetCurrencies()]
        );
    }

    public function createNewSale(Request $request): RedirectResponse
    {
        $this->logInfo('New sale created for product ' . $request->productName);
        $newSaleItem = new Sale();
        $newSaleItem->time = date('Y-m-d H:i:s');
        $newSaleItem->amount = $request->amount;
        $newSaleItem->installments = 1;
        $newSaleItem->sale_number = rand(10000000, 90000000);
        $newSaleItem->description = $request->productName;
        $newSaleItem->currency = $request->currency;
        $newSaleItem->payment_link = 'https://sandbox.payme.io/sale/generate/SALE1498-567890BD-XKYB7QH5-C3MQXRKB';
        $newSaleItem->language = 'en';

        $newSaleItem->seller_payme_id = (string) Str::uuid('MPL14985-68544Z1G-SPV5WK2K-0WJWHC7N');
        $newSaleItem->payme_sale_id = (string) Str::uuid('SALE1498-567890BD-XKYB7QH5-C3MQXRKB');
        $newSaleItem->transaction_id = (string) Str::uuid('');

        $newSaleItem->save();
        return redirect('/');
    }

    public function logInfo($info): void
    {
        Log::info('DEBUG: ' . $info);
    }
}
