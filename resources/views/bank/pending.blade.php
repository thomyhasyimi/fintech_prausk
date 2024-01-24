@extends('layouts.app')
@section('content')
<div class="pending-header mb-4 m-5">
    <h1 class="text-2xl">Pending Transactions</h1>
</div>

<div class="m-5">
    <a href="/" class="w-full px-5 bg-slate-300 hover:bg-slate-700 duration-700 active:border-x-green-600 transition rounded py-2 hover:text-white">Kembali</a>
</div>


<div class="pending-body mx-10">
    <table class="border w-full">
        <thead>
            <tr class="border">
                <th class="border border-black px-4 py-2">ID</th>
                <th class="border border-black px-4 py-2">User</th>
                <th class="border border-black px-4 py-2">Amount</th>
                <th class="border border-black px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendings as $pending)
                <tr class="border border-black">
                    <td class="border p-2 text-center border-black">{{ $pending->id }}</td>
                    <td class="border p-2 text-center border-black">{{ $pending->user->name }}</td>
                    <td class="border p-2 text-center border-black">{{ $pending->credit }}</td>
                    <td class="border p-2 text-center border-black">
                        <div class="buttons flex gap-2 justify-center w-full">
                            <form action="/topup/pending/{{ $pending->id }}" method="POST">
                                @csrf
                                <button class="bg-green-300 hover:bg-green-400 py-2 px-4 rounded transition">Accept</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection