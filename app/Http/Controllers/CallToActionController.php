<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Seller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class CallToActionController extends Controller
{
  public function preview(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();
    return view('invoice.preview-transaction', compact('order'));
  }

  public function download(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();
    $seller_bank = Seller::join('bank_accounts', 'sellers.bank_account_id', '=', 'bank_accounts.id')->where('sellers.id', $order->seller_id)->first();
    $pdf = Pdf::loadView('invoice.download-transaction', compact('order', 'seller_bank'));
    return $pdf->download($order->uuid . '.pdf');
  }
}
