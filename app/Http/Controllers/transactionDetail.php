<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\transactionDetail as ModelsTransactionDetail;
use Exception;
use Illuminate\Http\Request;

class transactionDetail extends Controller
{
    public function index($code)
    {
        $transaction_d = ModelsTransactionDetail::where('transaction_id',$code)->get();
        $name_customer = Transaction::where('id',$code)->first()->name_customer;
        return view('menu.trans_detail', compact('transaction_d', 'name_customer','code'));
    }

    public function get($code)
    {
        $transaction_d = ModelsTransactionDetail::where('id',$code)->first();
        return response()->json($transaction_d);
    }

    public function store(Request $req)
    {
        try {
            
            ModelsTransactionDetail::create([
                'transaction_id'=>$req->transaction_id,
                'product'=>$req->product,
                'quantity'=>$req->quantity,
                'price'=>$req->price,
                'q_price'=>$req->price*$req->quantity
            ]);
            $q_price = ModelsTransactionDetail::where('transaction_id',$req->transaction_id)->sum('q_price');
            Transaction::where('id',$req->transaction_id)->update([
                'sum_price'=>$q_price
            ]);
            toast('Successfull Add Transaction Detail List', 'success', 'bottom-right');
            return back();
        } catch (Exception $e) {
            toast('Error', 'error', 'bottom-right');
            return back();
        }
    }

    public function update(Request $req,$code)
    {
        try {
            ModelsTransactionDetail::where('id',$code)->update([
                'transaction_id'=>$req->transaction_id,
                'product'=>$req->product,
                'quantity'=>$req->quantity,
                'price'=>$req->price,
                'q_price'=>$req->price*$req->quantity
            ]);
            $q_price = ModelsTransactionDetail::where('transaction_id',$req->transaction_id)->sum('q_price');
            Transaction::where('id',$req->transaction_id)->update([
                'sum_price'=>$q_price
            ]);
            toast('Successfull Update Transaction Detail List', 'success', 'bottom-right');
            return back();
        } catch (Exception $e) {
            toast('Error', 'error', 'bottom-right');
            return back();
        }
    }

    public function delete($code)
    {
        try {
            $t_id = ModelsTransactionDetail::where('id',$code)->first()->transaction_id;
            ModelsTransactionDetail::where('id',$code)->delete();
            $q_price = ModelsTransactionDetail::where('transaction_id',$t_id)->sum('q_price');
            Transaction::where('id',$t_id)->update([
                'sum_price'=>$q_price
            ]);
            toast('Successfull Delete Transaction Detail List', 'success', 'bottom-right');
            return back();
        } catch (Exception $e) {
            toast('Error', 'error', 'bottom-right');
            return back();
        }
    }
}
