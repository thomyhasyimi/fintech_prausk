@extends('layouts.app')
@section('content')


<div class="cart-head flex flex-row justify-between items-center m-5">
    <h1 class="text-2xl">Cart</h1>
    <p>Saldo: <span class="px-4 py-2 mr-10 font-semibold text-xl rounded border-b-[3px] border-green-500">Rp.{{ $balance }}</span></p>
</div>

<div class="m-5">
    <a href="/" class="w-full px-5 bg-slate-300 hover:bg-slate-700 duration-700 active:border-x-green-600 transition rounded py-2 hover:text-white">Kembali</a>
</div>

<div class="cart-body mx-10">
    <table class="border w-full ">
        <thead>
            <tr class="border">
                <th class="border border-black px-4 py-2">Photo</th>
                <th class="border border-black px-4 py-2">Product</th>
                <th class="border border-black px-4 py-2">Category</th>
                <th class="border border-black px-4 py-2">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $item)
                <tr class="border border-black">
                    <td class="border border-black p-2 text-center"><img src="{{ $item->product->photo }} " cls="flex justify-center items-center" width="100px"></td>
                    <td class="border border-black p-2 text-center">{{ $item->product->name }}</td>
                    <td class="border border-black p-2 text-center">{{ $item->product->category->name }}</td>
                    <td class="border border-black p-2 text-center">Rp.{{ $item->product->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mr-20 card-foot w-full flex items-end flex-col justify-end my-4">
    <p class="text-xl mr-10">Total Price: <span class="font-black">${{ $total_price }}</span></p>
</div>

<div class="flex justify-center">
    <form action="/siswa/cart" method="POST">
        @csrf
        <button class="ml-10 px-10 py-4 text-end bg-green-600 hover:bg-green-800 hover:shadow-lg hover:text-white hover:shadow-slate-400 transition rounded duration-700">Pay now</button>
    </form>
</div>
@endsection