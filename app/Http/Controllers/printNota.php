<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\transactionDetail;
use Illuminate\Http\Request;

class printNota extends Controller
{
    public function print($code){
        $t_detail = Transaction::where('id',$code)->with('detail')->first();
        return view('menu.invoice', compact('t_detail'));
    }
}
