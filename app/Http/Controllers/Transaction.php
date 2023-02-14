<?php

namespace App\Http\Controllers;

use App\Models\Transaction as ModelsTransaction;
use Exception;
use Illuminate\Http\Request;

class Transaction extends Controller
{
    public function index()
    {
        $transaction = ModelsTransaction::all();
        return view('menu.transaction', compact('transaction'));
    }

    public function get($code)
    {
        $transaction = ModelsTransaction::find($code)->first();
        return response()->json($transaction);
    }

    public function store(Request $req)
    {
        try {
            ModelsTransaction::create($req->all());
            toast('Successfull Add Transaction List', 'success', 'bottom-right');
            return back();
        } catch (Exception $e) {
            toast('Error', 'error', 'bottom-right');
            return back();
        }
    }

    public function update(Request $req, $code)
    {
        try {
            ModelsTransaction::where('id',$code)->update([
                'name_customer' => $req->name_customer,
                'no_telp' => $req->no_telp,
                'address'=>$req->address
            ]);
            toast('Successfull Update Transaction List', 'success', 'bottom-right');
            return back();
        } catch (Exception $e) {
            toast('Error', 'Error', 'bottom-right');
            return back();
        }
    }

    public function delete($code)
    {
        try {
            ModelsTransaction::where('id',$code)->delete();
            toast('Successfull Delete Transaction List', 'success', 'bottom-right');
            return back();
        } catch (Exception $e) {
            toast('Error', 'error', 'bottom-right');
            return back();
        }
    }
}
