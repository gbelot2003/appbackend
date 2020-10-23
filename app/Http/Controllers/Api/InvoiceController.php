<?php

namespace App\Http\Controllers\Api;

use App\Invoice;
use App\InvoiceProduct;
use App\Events\TestEvent;
use App\Events\NewInvoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{

    public function historial()
    {
        $user = auth()->user()->id;
        $invoices = Invoice::where('user_id', $user)
            ->limit(10)
            ->orderBy('id', 'DESC')
            ->get();
        return response()->json($invoices, 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $user = $request->get('user_id');
        $shopcar = $request->get('shopCart');
        $request['estado'] = 'Pedido Creado';

        //return $shopcar;
        $invoice = Invoice::create($request->all());

        if (array_key_exists(0, $shopcar)){
            foreach ($shopcar as $val){
                InvoiceProduct::create([
                    'product_id' => $val['id'],
                    'prod_cant' => $val['cantidad'],
                    'invoices_id' => $invoice->id
                ]);
            }
        }

        $toSend = Invoice::where('id', $invoice->id)->with('user')->first();

        event(new NewInvoice($toSend));



        return response()->json('h', 200);
    }
}
