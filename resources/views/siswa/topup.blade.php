@extends('layouts.app')
@section('content')
    <div class="m-5 topup-header flex items-center justify-between">
        <h1 class="text-2xl">Topup</h1>
        <p>Saldo: <span class="px-4 py-2 mr-10 font-semibold text-xl rounded border-b-[3px] border-green-500">Rp.{{ $balance }}</span></p>
    </div>

    <div class="m-5">
        <a href="/" class="w-full px-5 bg-slate-300 hover:bg-slate-700 duration-700 active:border-x-green-600 transition rounded py-2 hover:text-white">Kembali</a>
    </div> 
    
    <div class="flex justify-center items-center">
        <div class="topup-body mt-4 mx-10 border-2 rounded-lg p-5 w-1/2 flex justify-center items-center">
            <form action="/siswa/topup" class="form-create flex flex-col gap-4" method="POST">
                @csrf
                <div class="form-input flex flex-col items-center justify-center ">
                    <label for="credit">Amount</label>
                    <input type="number" class="border-2 outline-none rounded-md px-4 focus:bg-slate-200 duration-700 py-2" name="credit" id="credit">
                </div>
                <div class="form-input">
                    <button class="w-full bg-slate-500 hover:bg-slate-700 duration-700 active:border-x-green-600 transition rounded py-2 hover:text-white">Top up</button>
                </div>
            </form>
        </div>
    </div>
@endsection