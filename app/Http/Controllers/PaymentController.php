<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Transaction::with('users')->where('status', 1)->get();

        return view('content.admin.payment.index', compact('payments'));
    }

    public function confirmTransaction($id)
    {
        $confirm = Transaction::find($id);

        $confirm->status = 3;
        $confirm->update();

        alert()->success('Transaction was confirmed !', 'Success');
        return redirect()->route('transactions.index');
    }

    public function rejectTransaction($id)
    {
        $reject = Transaction::find($id);

        $reject->status = 5;
        $reject->update();

        alert()->success('Transaction was rejected !', 'Success');
        return redirect()->route('transactions.index');
    }
}
