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
        $this->logInfo('Main page loaded');
        return view('mainPage',
            ['createdSales' => Sale::all()],
        );
    }

    public function createNewSale(Request $request): RedirectResponse
    {
        $this->logInfo(json_encode('New sale created: '));
        /*
                $newSaleItem = new Sale();
                $newSaleItem->name = $request->listItem;
                $newSaleItem->completed = false;
                $newSaleItem->save();
        */
        return redirect('/');
    }

    public function logInfo($info): void
    {
        Log::info('DEBUG: ' . $info);
    }
}
