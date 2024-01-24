@extends('layouts.app')
@section('content')


<div class="m-5 flex flex-row justify-between items-center mb-4 text-xl">
    <h1 class="text-2xl">Products</h1>
    <p>Saldo: <span class="px-4 py-2 mr-10 font-semibold text-xl rounded border-b-[3px] border-green-500">Rp.{{ $balance }}</span></p>
</div>

<div class="m-5">
    <a href="/" class="w-full px-5 bg-slate-300 hover:bg-slate-700 duration-700 active:border-x-green-600 transition rounded py-2 hover:text-white">Kembali</a>
</div>

<div class="products-body m-5 border-2 p-10 rounded-lg">
    @session('status')
        <p class="px-4 py-2 bg-red-300 rounded">{{ session('status') }}</p>
    @endsession
    <div class="grid grid-cols-4 gap-10 mx-10">
        @foreach ($products as $product)
        <div class="product rounded-lg shadow-slate-500 shadow-lg hover:scale-110 duration-700">
            <h1 class="text-xl py-1 text-center bg-slate-200 font-semibold rounded-t-lg">{{ $product->name }}</h1>
            <div class="product-head">
                <img class="rounded-tr rounded-tl w-full h-[200px] object-cover object-center" src="{{ $product->photo }}" alt="">
            </div>
            <div class="product-body p-4 rounded-br rounded-bl  border-black">
                <div class="product-body-desc mb-4 ">
                    <p class="text-slate-500 text-[15px]">{{$product->desc}}</p>
                    <p class="text-emerald-500 font-black text-right text-xl hover:border-b-2    hover:border-green-500 duration-700">Rp{{ $product->price }}</p>
                </div>
                <div class="product-body-button flex justify-between items-center ">
                    <p class="border-2 w-fit p-2 hover:border-x-green-700 duration-700 rounded-2xl">{{ $product->stock }}</p>
                    <form action="/cart/{{ $product->id }}" method="POST">
                        @csrf
                        <button class="px-2 py-1 bg-green-600 hover:bg-green-800 hover:shadow-lg hover:text-white hover:shadow-slate-400 transition rounded w-full duration-700">Tambah Keranjang</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection