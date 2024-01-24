<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function products() {
        $products = Product::get();
        $transactions = Wallet::where('user_id', auth()->user()->id)->get();
        $credit = 0;
        $debit = 0;

        foreach($transactions as $trans) {
            $credit += $trans->credit;
            $debit += $trans->debit;
        }

        $balance = $credit - $debit;
        return view('siswa.products', compact('products', 'balance'));
    }

    public function addCart($id) {
        $product = Product::find($id);

        Transaction::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'status' => 'pending'
        ]);

        $product->update([
            'stock' => $product->stock-1
        ]);

        return redirect()->back();
    }

    public function topup_get() {
        $transactions = Wallet::where('user_id', auth()->user()->id)->get();
        $credit = 0;
        $debit = 0;
        foreach($transactions as $trans) {
            $credit += $trans->credit;
            $debit += $trans->debit;
        }
        $balance = $credit - $debit;
        return view('siswa.topup', compact('balance'));
    }

    public function topup_post(Request $request) {
        Wallet::create([
            'credit' => $request->credit,
            'debit' => null,
            'user_id' => auth()->user()->id,
            'status' => 'pending'
        ]);
        return redirect('/')->with('status', 'Berhasil Menambahkan Saldo');
    }

    public function cart_get() {
        $transactions = Wallet::where('user_id', auth()->user()->id)->get();
        $credit = 0;
        $debit = 0;
        foreach($transactions as $trans) {
            $credit += $trans->credit;
            $debit += $trans->debit;
        }
        $total_price = 0;

        $balance = $credit - $debit;
        $cart = Transaction::where('user_id', auth()->user()->id)->where('status', 'pending')->get();

        foreach($cart as $item) {
            $total_price += $item->product->price;
        }

        return view('siswa.cart', compact('balance', 'cart', 'total_price'));
    }

    public function cart_post() {
        $transactions = Wallet::where('user_id', auth()->user()->id)->get();
        $credit = 0;
        $debit = 0;
        foreach($transactions as $trans) {
            $credit += $trans->credit;
            $debit += $trans->debit;
        }
        $balance = $credit - $debit;

        $cart = Transaction::where('user_id', auth()->user()->id)->where('status', 'pending')->get();

        if(count($cart) < 1) {
            return redirect('/siswa/products')->with('status', 'Empty cart');
        } else {
            $total_price = 0;

            foreach($cart as $item) {
                $total_price += $item->product->price;
            }

            if($total_price > $balance) {
                return redirect('/siswa/products')->with('status', 'Insufficient balance');
            }

            else {
                Wallet::create([
                    'debit' => $total_price,
                    'credit' => null,
                    'user_id' => auth()->user()->id,
                    'status' => 'success'
                ]);

                $code = bin2hex(random_bytes(5));

                foreach($cart as $item) {
                    $item->update([
                        'status' =>'success',
                        'code' => $code,
                    ]);
                }

                return redirect("/siswa/cart/invoice/$code");
            }
        }

    }

    public function transaction_get() {
        $wallets = Wallet::where('user_id', auth()->user()->id)->get();
        return view('siswa.transaction', compact('wallets',));
    }

    public function pastcart_get() {
        $transactions = collect(Transaction::where('user_id', auth()->user()->id)->get())->sortByDesc('created_at')->groupBy('code');
        return view('siswa.pastcart', compact('transactions'));
    }

    public function invoice($code) {
        $transaction = Transaction::where('user_id', auth()->user()->id)->where('code', $code)->get();
        return view('layouts.invoice', compact('transaction', 'code', ));
    }
}
