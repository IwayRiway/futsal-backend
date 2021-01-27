<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{
    public function transaction(Request $request)
    {
        $transaction_data = [
            'user_id' => $request->user_id,
            'type' => $request->type,
            'price' => $request->price,
            'ticket_id' => ($request->type==1?'FB':'FF') . mt_rand(10000,99999) . mt_rand(100,999),
            'ticket_date' => $request->ticket_date,
        ];
        $transaction = Transaction::create($transaction_data);

        $transactionDetails_data = [];
        $items = $request->items;
        foreach ($items as $key => $dt) {
            $array = [
                'transaction_id' => $transaction->id,
                'item_id' => $dt->item_id,
                'hour_id' => $dt->hour_id,
                'quantity' => $dt->quantity,
            ];

            array_push($transactionDetails_data, $array);
        }

        $transaction_detail = TransactionDetail::insert($transactionDetails_data);

        if($transaction AND $transaction_detail){
            $data['code'] = 200;
            $data['status'] = 'Transaksi Berhasil';
        } else {
            $data['code'] = 400;
            $data['status'] = 'Transaksi Gagal';
        }

        return $data;
    }

    public function history(Request $request)
    {
        $data['code'] = 200;
        $data['status'] = 'Berhasil';
        $data['result']['process'] = Transaction::with('transaction_details')
                                                    ->where('user_id', $request->user_id)
                                                    ->where('ticket_date', '<=', date('Y-m-d'))
                                                    ->get();
        $data['result']['complete'] = Transaction::with('transaction_details')
                                                    ->where('user_id', $request->user_id)
                                                    ->where('ticket_date', '>=', date('Y-m-d'))
                                                    ->get();

        return $data;
    }
}
