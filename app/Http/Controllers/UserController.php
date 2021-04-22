<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Products;
use App\Models\Transaction;
use App\Models\TransactionDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        $products = Products::orderBy('stock', 'DESC')->get();
        return view('content.user.home', compact('products'));
    }

    public function foodsMenu()
    {
        $products = Products::where('category', 'Food')->get();
        return view('content.user.foods', compact('products'));
    }

    public function drinksMenu()
    {
        $products = Products::where('category', 'Drink')->get();
        return view('content.user.drinks', compact('products'));
    }

    public function detailProducts($id)
    {
        $products = Products::find($id);

        return view('content.user.detailProducts', compact('products'));
    }

    public function addCart(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'qty' => 'required|min:1|integer'
            ]
        );

        $products = Products::find($id);

        //validasi apakah MELEBIHI STOK
        if ($request->qty > $products->stock) {
            alert()->error('Melebihi Batas Stok Bos', 'Error');
            return redirect()->route('user.detailProducts'. $products);
        }

        //cek VALIDASI
        $checkTransaction = Transaction::where('users_id', Auth::guard('user')->user()->id)->where('status', 0)->first();
        //simpan ke database PESANAN
        if (empty($checkTransaction)) {
            $transactions = new Transaction();
            $transactions->users_id      = Auth::guard('user')->user()->id;
            $transactions->status       = 0;
            $transactions->total_price  = 0;
            $transactions->save();
        }

        //simpan ke database PESANAN_DETAIL
        $newTransactions = Transaction::where('users_id', Auth::guard('user')->user()->id)->where('status', 0)->first();

        //cek PESANAN DETAIL
        $checkTransactionDetails = TransactionDetails::where('products_id', $products->id)->where('transaction_id', $newTransactions->id)->first();
        if (empty($checkTransactionDetails)) {
            $transactionDetails = new TransactionDetails();
            $transactionDetails->products_id    = $products->id;
            $transactionDetails->transaction_id = $newTransactions->id;
            $transactionDetails->qty            = $request->qty;
            $transactionDetails->total_price    = $products->price * $request->qty;
            $transactionDetails->save();
        } else {
            $transactionDetails = TransactionDetails::where('products_id', $products->id)->where('transaction_id', $newTransactions->id)->first();
            if ($transactionDetails->qty + $request->qty > $products->stock) {
                alert()->error('Barang Yang Di Keranjang Sudah Melebihi Batas Stok Bos ! ', 'Error');
                return redirect()->route('user.detailProducts');
            }
            $transactionDetails->qty         = $transactionDetails->qty + $request->qty;
            //HARGA SEKARANG
            $newPriceTransactionDetails = $products->price * $request->qty;
            $transactionDetails->total_price   = $transactionDetails->qty + $newPriceTransactionDetails;
            $transactionDetails->update();
        }

        //jumlah TOTAL
        $transactions = Transaction::where('users_id', Auth::guard('user')->user()->id)->where('status', 0)->first();
        $transactions->total_price = $transactions->total_price + $products->price * $request->qty;
        $transactions->update();

        alert()->success('Pesanan Sukses Masuk Keranjang', 'Success');
        return redirect()->route('user.cart');
    }

    public function cart()
    {
        $transactions = Transaction::where('users_id', Auth::guard('user')->user()->id)->where('status', 0)->first();
        $transactionDetails = NULL;
        if (!empty($transactions)) {
            $transactionDetails = TransactionDetails::with('products')->where('transaction_id', $transactions->id)->get();
            return view('content.user.cart', compact('transactionDetails', 'transactions'));
        }
        return view('content.user.cart', compact('transactionDetails'));
    }

    public function deleteCart($id)
    {
        $transactionDetails = TransactionDetails::find($id);
        $transactions = Transaction::where('id', $transactionDetails->transaction->id)->first();

        $transactions->total_price = $transactions->total_price - $transactionDetails->total_price;
        $transactions->update();

        $transactionDetails->delete();
        return redirect()->route('user.cart');
    }

    public function checkout(Request $request)
    {
        if ($request->method_payment == 'COD') {
            $transactions = Transaction::where('users_id', Auth::guard('user')->user()->id)->where('status', 0)->first();
            $transactions_id = $transactions->id;
            $transactions->status = 3;
            $transactions->method_payment = $request->method_payment;
            $transactions->update();

            $transactionDetails = TransactionDetails::where('transaction_id', $transactions_id)->get();
            foreach ($transactionDetails as $transactionDetail) {
                $products = Products::where('id', $transactionDetail->products_id)->first();
                $products->stock = $products->stock - $transactionDetail->qty;
                $products->update();
            }
            return redirect()->route('user.historyDetails',$transactions);
        } else {
            $transactions = Transaction::where('users_id', Auth::guard('user')->user()->id)->where('status', 0)->first();
            $transactions_id = $transactions->id;
            $transactions->status = 1;
            $transactions->method_payment = $request->method_payment;
            $transactions->pay_limit = Carbon::now()->addDays(1);
            $transactions->update();

            $getTransactions = Transaction::where('users_id', Auth::guard('user')->user()->id)->where('status', 1)->first();
            $getTransactions_id = $getTransactions->id;

            $payment = new Payment();
            $payment->users_id          = Auth::guard('user')->user()->id;
            $payment->transaction_id    = $getTransactions_id;
            $payment->pay_limit         = Carbon::now()->addDays(1);
            $payment->save();

            $transactionDetails = TransactionDetails::where('transaction_id', $transactions_id)->get();
            foreach ($transactionDetails as $transactionDetail) {
                $products = Products::where('id', $transactionDetail->products_id)->first();
                $products->stock = $products->stock - $transactionDetail->qty;
                $products->update();
            }

            return redirect()->route('user.historyDetails',$transactions);
        }
    }

    public function history()
    {
        $transactions = Transaction::where('users_id', Auth::guard('user')->user()->id)->where('status', '!=', 0)->get()->sortBy('status');

        return view('content.user.history.index', compact('transactions'));
    }

    public function historyDetails($id)
    {
        $payment = Payment::with('transaction')->get();
        $transactions = Transaction::find($id);
        $transactionDetails  = TransactionDetails::where('transaction_id', $transactions->id)->get();

        return view('content.user.history.detail', compact('payment', 'transactions', 'transactionDetails'));
    }
}
