@extends('layouts.app')

@section('content')
<div class="container text-white">
    <h2 class="mb-4">Recent Purchases</h2>
    <table class="table table-dark table-bordered">
        <thead>
            <tr>
                <th>Usuário</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Data Compra</th>
            </tr>
        </thead>
        <tbody>
            @forelse($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->user->name }}</td>
                    <td>{{ $purchase->product->name }}</td>
                    <td>{{ $purchase->quantity }}</td>
                    <td>{{ $purchase->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Sem Compras Efetuadas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
