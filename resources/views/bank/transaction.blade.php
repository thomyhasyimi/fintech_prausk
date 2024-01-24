@extends('layouts.app')
@section('content')
<div class="transaction-header mb-4 m-5">
    <h1 class="text-2xl">Transactions</h1>
</div>

<div class="m-5">
    <a href="/" class="w-full px-5 bg-slate-300 hover:bg-slate-700 duration-700 active:border-x-green-600 transition rounded py-2 hover:text-white">Kembali</a>
</div>

<div class="transaction-body mx-10">
    <table class="border w-full">
        <thead>
            <tr class="border rounded-lg">
                <th class="border border-black px-4 py-2">ID</th>
                <th class="border border-black px-4 py-2">User</th>
                <th class="border border-black px-4 py-2">Credit</th>
                <th class="border border-black px-4 py-2">Debit</th>
                <th class="border border-black px-4 py-2">Status</th>
                <th class="border border-black px-4 py-2">Time</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($wallets as $wallet)
                <tr class="border border-black hover:bg-slate-200">
                    <td class="border p-2 text-center border-black">{{ $wallet->id }}</td>
                    <td class="border p-2 text-center border-black">{{ $wallet->user->name }}</td>
                    <td class="border p-2 text-center border-black">
                        @if ($wallet->credit)
                            {{ $wallet->credit }}
                        @else
                            -
                        @endif
                    </td>
                    <td class="border p-2 text-center border-black">
                        @if ($wallet->debit)
                            {{ $wallet->debit }}
                        @else
                            -
                        @endif
                    </td>
                    <td class="border p-2 text-center border-black">
                        {{ $wallet->status }}
                    </td>
                    <td class="border p-2 text-center border-black">
                        @if ($wallet->created_at)
                            {{ $wallet->created_at }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection