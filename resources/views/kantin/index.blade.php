@extends('layouts.app')
@section('content')
    {{-- <button type="submit"><a href="logout">Logout</a></button> --}}

    <div class=" flex relative ">
        <div class="h-screen w-[300px] bg-gradient-to-br from-[#ffd89b] to-[#19547b] rounded-lg py-10 pl-3">
            <h1 class="text-black font-semibold text-3xl">  <span class="text-semibold text-white">{{$user->name}}</span></h1>
            <ul class="flex flex-col justify-center my-3 gap-5 w-full px-2 py-5">
                <li class=""><a href="/" class="hover:bg-slate-100 transition p-1 rounded">Home</a></li>
                <li class=""><a href="/add-product" class="hover:bg-slate-100 transition p-1 rounded">Tambah</a></li>
                <li class=""><a href="/transaction" class="hover:bg-slate-100 transition p-1 rounded">Transaksi</a></li>
            </ul>
        <div class="absolute bottom-5">
            <button type="submit"><a href="logout" class="text-xl font-medium ml-3 hover:bg-white px-3 py-1 rounded-md border-2">Logout</a></button>
        </div>
        </div>
        <div class="ml-40 w-full ">
            <div class="pt-10">
                <h1 class="ml-5 text-xl">Rekap Data</h1>
                <div class=" grid grid-cols-2 px-4 py-10 space-x-5">
                    <div class="border p-3 rounded-md shadow-md">
                        <h2>Jumlah Produk</h2>
                        <p>{{$proto}}</p>
                    </div>
                    <div class="border p-3 rounded-md shadow-md">
                        <h2>Jumlah Transaksi</h2>
                        <p>{{$transcount}}</p>
                    </div>
                </div>
            </div>

            <div class=" mx-5">
                <h1 class="ml-5 mb-5 text-xl">Produk</h1>
                <table class="w-full">
                    <thead>
                        <tr class="">
                            <th class="border-2 border-black">No</th>
                            <th class="border-2 border-black">Photo</th>
                            <th class="border-2 border-black">Name</th>
                            <th class="border-2 border-black">Description</th>
                            <th class="border-2 border-black">Category</th>
                            <th class="border-2 border-black">Stock</th>
                            <th class="border-2 border-black">Price</th>
                            <th class="border-2 border-black">Action</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($products as $key => $product)    
                            <tr class="gap-2">
                                <td class="text-center border-2 ">{{$key+1}}</td>
                                <td class="border-2"><img src="{{$product->photo}}" alt="" class="flex jutify-center items-center object-cover w-20"></td>
                                <td class="text-center border-2 ">{{$product->name}}</td>
                                <td class="text-center border-2 ">{{$product->desc}}</td>
                                <td class="text-center border-2 ">{{$product->category->name}}</td>
                                <td class="text-center border-2 ">{{$product->stock}}</td>
                                <td class="text-center border-2 ">{{$product->price}}</td>
                                <td class="border-2 ">
                                    <div class="flex justify-around items-center">
                                        <a href="edit-product/{{ $product->id }}" class="bg-yellow-300 hover:bg-yellow-400 py-2 px-4 rounded transition">Edit</a>
                                        <form action="/delete-product/{{ $product->id }}" method="POST">
                                            @csrf
                                            <button class="bg-red-300 hover:bg-red-400 py-2 px-4 rounded transition">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        
    </div>

    
@endsection