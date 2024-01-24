@extends('layouts.app')
@section('content')
<div class="pastcart-head mb-4 m-5">
    <h1 class="text-2xl">Past Orders</h1>
</div>

<div class="m-5">
    <a href="/" class="w-full px-5 bg-slate-300 hover:bg-slate-700 duration-700 active:border-x-green-600 transition rounded py-2 hover:text-white">Kembali</a>
</div>

<div class="pastcart-body mx-10">
    @foreach($transactions as $code => $transactionGroup)
            <div class="border rounded p-4 mb-4">
                @php
                    $transac = $transactionGroup[0];
                @endphp
                <h3 class="text-lg font-bold mb-2">TRANSACTION{{ $code }}</h3>
                <p class="">{{ $transac->created_at }}</p>
                <ul class="list-none p-0 m-0">
                    @php
                        $totalPrice = 0;
                    @endphp

                    @foreach($transactionGroup as $transaction)
                        <li class="border-b py-2">
                            <strong class="font-semibold">Produk:</strong> {{ $transaction->product->name }}<br>
                            <strong class="font-semibold">Harga:</strong> ${{ $transaction->product->price }}<br>
                        </li>

                        @php
                            $totalPrice += $transaction->product->price;
                        @endphp
                    @endforeach
                </ul>

                <div class="mt-2">
                    <strong class="font-semibold">Total Harga: ${{ $totalPrice }}</strong>
                </div>
            </div>
        @endforeach
</div>

@endsection