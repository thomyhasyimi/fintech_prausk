@extends('layouts.app')
@section('content')

    

    <div class=" flex relative ">
        <div class="h-screen w-[300px] bg-gradient-to-br from-[#ffd89b] to-[#19547b] rounded-lg py-10 pl-3">
            <h1 class="text-black font-semibold text-3xl">Fintech <span class="text-semibold text-white">{{$user->name}}</span></h1>
            <ul class="flex flex-col justify-center my-3 gap-5 w-full px-2 py-5">
                <li class=""><a class="hover:bg-slate-100 transition p-1 rounded" href="/">Home</a></li>
                <li class=""><a class="hover:bg-slate-100 transition p-1 rounded" href="/siswa/products">Products</a></li>
                <li class=""><a class="hover:bg-slate-100 transition p-1 rounded" href="/siswa/cart">Cart</a></li>
                <li class=""><a class="hover:bg-slate-100 transition p-1 rounded" href="/siswa/topup">Topup</a></li>
                <li class=""><a class="hover:bg-slate-100 transition p-1 rounded" href="/siswa/transactions">Transactions</a></li>
                <li class=""><a class="hover:bg-slate-100 transition p-1 rounded" href="/siswa/cart/past">Past Orders</a></li>
            </ul>
            <div class="absolute bottom-5">
                <button type="submit"><a href="logout" class="text-xl font-medium ml-3 hover:bg-white px-3 py-1 rounded-md duration-700 border-2">Logout</a></button>
            </div>

            @session('status')
                    <p class="px-4 py-2 my-10 bg-green-600 rounded w-fit>{{ session('status') }}</p>
            @endsession
        </div>
        <div class="flex justify-center mx-auto items-center">
            <p class="text-4xl">Halo, <span class="text-green-700 hover:text-green-800 font-bold">{{$user->name}}</span></p>
        </div>
        


        
    </div>

    
@endsection