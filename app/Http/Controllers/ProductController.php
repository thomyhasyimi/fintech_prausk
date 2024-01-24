<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        // $wallets = Wallet::where('user_id', auth()->user()->id)->get();
        // $credit = $wallets->sum('credit');
        // $debit = $wallets->sum('debit');

        // $saldoUser = $credit - $debit;

        $proto = $products->count();
        return view('kantin', compact('products', 'user', 'proto', 'saldoUser'));
    }

    public function transacount() {
        $wallets = Wallet::get();
        return view('kantin.index', compact('wallets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            $categories = Category::get();
            return view('kantin.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect('/')->with('status', "Berhasil Tambah");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, $id)
    {
        $categories = Category::get();
        $product = Product::find($id);
            return view('kantin.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if(!$product) {
            return redirect()->back();
        }
        $product->delete();
        return redirect()->back();
    }

    public function deleteProductCard(Request $request)
    {
        $products = Product::all();

        $product_id = $request->product_id;
        // dd($product_id);

        $product = Product::find($product_id);

        return view('delete_product', compact('product', 'products'));
    }

}
