<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Products;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('users')->where('status', 1)->get();

        return view('content.admin.payment.index', compact('payments'));
    }

    public function confirmTransaction($id)
    {
        $confirm = Payment::find($id);
        $transactions = Transaction::where('id', $confirm->transaction_id)->first();
        $confirm->status = 2;
        $confirm->update();

        $transactions->status = 3;
        $transactions->update();

        alert()->success('Transaction was confirmed !', 'Success');
        return redirect()->route('transactions.index');
    }

    public function rejectTransaction($id)
    {
        $reject = Payment::find($id);
        $transactions = Transaction::where('id', $reject->transaction_id)->first();
        $reject->status = 3;
        $reject->update();

        $transactions->status = 5;
        $transactions->update();

        alert()->success('Transaction was rejected !', 'Success');
        return redirect()->route('transactions.index');
    }
}
